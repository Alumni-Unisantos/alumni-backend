<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/feed', name: 'api_feed_')]
class FeedController extends AbstractController
{
    private PostagemRepository $postagemRepository;

    public function __construct(PostagemRepository $postagemRepository)
    {
        $this->postagemRepository = $postagemRepository;
    }

    #[Route('/inserirPostagem', name: 'inserirPostagem', methods: ['POST'])]
    public function inserirPostagem(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $conteudo = $data['conteudo'] ?? null;
        $userId = $data['userId'] ?? null;

        if (!$conteudo || !$userId) {
            return $this->json(['error' => 'Campos obrigatórios ausentes.'], 400);
        }

        $postagem = new Postagem();
        $postagem->setConteudo($conteudo)
            ->setUserId($userId)
            ->setDataPostagem(new \DateTime());

        $this->postagemRepository->create($postagem);

        return $this->json([
            'message' => 'Postagem criada com sucesso!',
            'id' => $postagem->getId()
        ], 201);
    }

    #[Route('/buscarUltimasPostagens', name: 'buscarUltimasPostagens', methods: ['GET'])]
    public function buscarUltimasPostagens(Request $request): JsonResponse
    {
        $postagens = $this->postagemRepository->buscarUltimasPostagens(10);
        
        $resultado = array_map(function (Postagem $postagem) {
            return [
                'userId' => $postagem->getUserId(),
                'conteudo' => $postagem->getConteudo(),
                'dataPostagem' => $postagem->getDataPostagem()?->format('Y-m-d H:i:s'),
            ];
        }, $postagens);

        return $this->json($resultado);
    }
}
