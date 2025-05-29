<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostagemRepository;
use App\Entity\Postagem;
use Psr\Log\LoggerInterface;

#[Route('/api/feed', name: 'api_feed_')]
class PostagemController extends AbstractController
{
    private PostagemRepository $postagemRepository;
    private LoggerInterface $logger;

    public function __construct(PostagemRepository $postagemRepository, LoggerInterface $logger)
    {
        $this->postagemRepository = $postagemRepository;
        $this->logger = $logger;
    }

    #[Route('/inserirPostagem', name: 'inserirPostagem', methods: ['POST'])]
    public function inserirPostagem(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $this->logger->info('Dados recebidos no backend', $data);

        $conteudo = $data['conteudo'] ?? null;
        $userId = $data['userId'] ?? null;

        if (!$conteudo || !$userId) {
            return $this->json(['error' => 'Campos obrigatórios ausentes.'], 400);
        }

        $postagem = new Postagem();
        $postagem->setConteudo($conteudo)
                 ->setUserId($userId)
                 ->setDataPostagem(new \DateTime());

        // $this->postagemRepository->create($postagem);

        return $this->json([
            'conteudo' => $postagem->getConteudo()
        ], 201);
    }

    #[Route('/buscarUltimasPostagens', name: 'buscarUltimasPostagens', methods: ['GET'])]
    public function buscarUltimasPostagens(Request $request): JsonResponse
    {
        // $postagens = $this->postagemRepository->buscarUltimasPostagens(10);
        $postagens = range(1, 10);

        // $resultado = array_map(function (Postagem $postagem) {
        //     return [
        //         'userId' => $postagem->getUserId(),
        //         'conteudo' => $postagem->getConteudo(),
        //         'dataPostagem' => $postagem->getDataPostagem()?->format('Y-m-d H:i:s'),
        //     ];
        // }, $postagens);
        $resultado = array_map(function ($i) {
            return [
                'userId' => 123 + $i,
                'conteudo' => "<div>Postagem $i funcionando</div>",
                'dataPostagem' => date('Y-m-d H:i:s', strtotime("-$i days")),
            ];
        }, $postagens);

        return $this->json($resultado);
    }
}
