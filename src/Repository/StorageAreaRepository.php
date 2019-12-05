<?php

namespace App\Repository;

use App\Entity\StorageArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StorageArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method StorageArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method StorageArea[]    findAll()
 * @method StorageArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StorageAreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StorageArea::class);
    }

    // /**
    //  * @return StorageArea[] Returns an array of StorageArea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StorageArea
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
