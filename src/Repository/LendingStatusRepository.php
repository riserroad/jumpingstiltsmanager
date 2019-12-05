<?php

namespace App\Repository;

use App\Entity\LendingStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LendingStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LendingStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LendingStatus[]    findAll()
 * @method LendingStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LendingStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LendingStatus::class);
    }

    // /**
    //  * @return LendingStatus[] Returns an array of LendingStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LendingStatus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
