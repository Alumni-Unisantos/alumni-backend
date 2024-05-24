<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
Use App\Entity\User;

#[Route ('/api', name: 'api_')]
class UserController extends AbstractController
{

    #[Route('/users', name: 'user_index',  methods:['get'])]
    public function index(ManagerRegistry $doctrine): JsonResponse
    {
        $Users = $doctrine
            ->getRepository(User::class)
            ->findAll();

        $data = [];

        foreach($Users as $User){
            $data[] = [
                'id' => $User->getId(),
                'nm_user' => $User->getNmUser(),
                'email_user' => $User->getEmailUser(),
                'nm_curso' => $User->getNmCurso(),
                'vl_document' => $User->getVlDocument(),
                'rm_user' => $User->getRmUser(),
                'ano_conclusao_curso' => $User->getAnoConclusaoCurso(),
                'vl_contato' => $User->getVlContato(),
                'ck_vinculo_user' => $User->isCkVinculoUser(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/users/{id}', name: 'show_user', methods:['get'])]
    public function show(ManagerRegistry $doctrine, int $id): JsonResponse
    {

        $User = $doctrine
            ->getRepository(User::class)
            ->find($id);

        if(!$User)
            return $this->json("Não foi localizado nenhum usuário para o id: ". $id, 404);

        $data = [
            'id' => $User->getId(),
            'nm_user' => $User->getNmUser(),
            'email_user' => $User->getEmailUser(),
            'nm_curso' => $User->getNmCurso(),
            'vl_document' => $User->getVlDocument(),
            'rm_user' => $User->getRmUser(),
            'ano_conclusao_curso' => $User->getAnoConclusaoCurso(),
            'vl_contato' => $User->getVlContato(),
            'ck_vinculo_user' => $User->isCkVinculoUser(),
        ];
        return $this->json($data);
    }

    #[Route('/users', name: 'create_user', methods:['post'])]
    public function create(ManagerRegistry $doctrine,Request $request): JsonResponse
    {

        $parameters = json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();
        $User = new User();

        $User->setNmUser($parameters['nm_user']);
        $User->setEmailUser($parameters['email_user']);
        $User->setNmCurso($parameters['nm_curso']);
        $User->setVlDocument($parameters['vl_document']);
        $User->setRmUser($parameters['rm_user']);
        $User->setAnoConclusaoCurso($parameters['ano_conclusao_curso']);
        $User->setVlContato($parameters['vl_contato']);
        $User->setCkVinculoUser($parameters['ck_vinculo_user']);

        $entityManager->persist($User);
        $entityManager->flush();

        $data = [
            'id' => $User->getId(),
            'nm_user' => $User->getNmUser(),
            'email_user' => $User->getEmailUser(),
            'nm_curso' => $User->getNmCurso(),
            'vl_document' => $User->getVlDocument(),
            'rm_user' => $User->getRmUser(),
            'ano_conclusao_curso' => $User->getAnoConclusaoCurso(),
            'vl_contato' => $User->getVlContato(),
            'ck_vinculo_user' => $User->isCkVinculoUser(),
        ];
        return $this->json($data);
    }


    #[Route('/users/{id}', name: 'update_user', methods:['put','patch'])]
    public function update(ManagerRegistry $doctrine, Request $request, int $id): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);
        $entityManager = $doctrine->getManager();

        $User = $entityManager
            ->getRepository(User::class)
            ->find($id);

        if(!$User)
            return $this->json("Não foi localizado nenhum usuário para o id: ". $id, 404);
        
        $User->setNmUser($parameters['nm_user']);
        $User->setEmailUser($parameters['email_user']);
        $User->setNmCurso($parameters['nm_curso']);
        $User->setVlDocument($parameters['vl_document']);
        $User->setRmUser($parameters['rm_user']);
        $User->setAnoConclusaoCurso($parameters['ano_conclusao_curso']);
        $User->setVlContato($parameters['vl_contato']);
        $User->setCkVinculoUser($parameters['ck_vinculo_user']);

        $entityManager->flush();

        $data = [
            'id' => $User->getId(),
            'nm_user' => $User->getNmUser(),
            'email_user' => $User->getEmailUser(),
            'nm_curso' => $User->getNmCurso(),
            'vl_document' => $User->getVlDocument(),
            'rm_user' => $User->getRmUser(),
            'ano_conclusao_curso' => $User->getAnoConclusaoCurso(),
            'vl_contato' => $User->getVlContato(),
            'ck_vinculo_user' => $User->isCkVinculoUser(),
        ];
        return $this->json($data);
    }

    #[Route('/users/{id}', name: 'delete_user', methods:['delete'])]
    public function delete(ManagerRegistry $doctrine, int $id): JsonResponse
    {

        $User = $doctrine
            ->getRepository(User::class)
            ->find($id);


        if(!$User)
            return $this->json("Não foi localizado nenhum usuário para o id: ". $id, 404);

        $doctrine->getManager()->remove($User);
        $doctrine->getManager()->flush();

        $data = ["Usuario Removido com Sucesso"];
        return $this->json($data);
    }
}
