<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostagemRepository;
use App\Repository\UserRepository;
use App\Entity\Postagem;
use App\Entity\User;
use Psr\Log\LoggerInterface;

#[Route('/api/feed', name: 'api_feed_')]
class PostagemController extends AbstractController
{
    private PostagemRepository $postagemRepository;
    private UserRepository $userRepository;
    private LoggerInterface $logger;

    public function __construct(PostagemRepository $postagemRepository, LoggerInterface $logger, UserRepository $userRepository)
    {
        $this->postagemRepository = $postagemRepository;
        $this->logger = $logger;
        $this->userRepository = $userRepository;
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

        $user = $this->userRepository->find($userId);

        if (!$user) {
            return $this->json(['error' => 'Usuário não encontrado.'], 404);
        }

        $postagem = new Postagem();

        $postagem->setConteudo($conteudo)
                 ->setUser($user)
                 ->setDataPostagem(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $this->postagemRepository->create($postagem);

        return $this->json([
            'conteudo' => $postagem->getConteudo(),
            'dataPostagem' => $postagem->getDataPostagem()?->format(\DateTime::ATOM)
        ], 201);
    }

    #[Route('/buscarUltimasPostagens', name: 'buscarUltimasPostagens', methods: ['GET'])]
    public function buscarUltimasPostagens(Request $request): JsonResponse
    {
        $postagens = $this->postagemRepository->buscarUltimasPostagens(10);

        $resultado = array_map(function (Postagem $postagem) {
            return [
                'userId' => $postagem->getUser()->getId(),
                'conteudo' => $postagem->getConteudo(),
                'dataPostagem' => $postagem->getDataPostagem()?->format(\DateTime::ATOM)
            ];
        }, $postagens);
        
        return $this->json($resultado);
    }
}
