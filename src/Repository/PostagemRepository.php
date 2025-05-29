<?php

namespace App\Repository;

use App\Entity\Postagem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Postagem>
 */
class PostagemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Postagem::class);
    }

    /**
     * @return Void
     */
    public function create(Postagem $Postagem): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($Postagem);
        $entityManager->flush();
    }

    /**
     * @return Postagem[]
     */
    public function buscarUltimasPostagens(int $limit = 10): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.dataPostagem', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}
