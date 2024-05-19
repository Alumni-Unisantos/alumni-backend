<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    // public function findByExampleField($value): array
    // {
    //     return $this->createQueryBuilder('u')
    //         ->andWhere('u.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('u.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult();
    // }


    /**
     * @return User Returns a User object
     */
    public function findByPk(int $id): ?User
    {
        return $this->findByPk($id);
    }

    /**
     * @return User[] Returns an array of User objects
     */
    public function listAll(): array
    {
        return $this->listAll();
    }

    /**
     * @return Void
     */
    public function create(User $User): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($User);
        $entityManager->commit();
        $entityManager->flush();
    }

    /**
     * @return Void
     */
    public function update(int $id, User $User): void
    {
        $entityManager = $this->getEntityManager();
        $entity = $entityManager->getRepository(User::class)->find($id);
    
        if (!$entity) {
            throw new \Exception('Usuario nao localizado' . $id);
        }
        
        $entityManager->commit();
        $entityManager->flush();
    }

    /**
     * @return Void
     */
    public function delete(int $id): void
    {
        $entityManager = $this->getEntityManager();
        $entity = $entityManager->getRepository(User::class)->find($id); 
    
        if (!$entity) {
            throw new \Exception('Usuario nao localizado' . $id);
        }
    
        $entityManager->remove($entity);
        $entityManager->commit();
        $entityManager->flush();
    }
}
