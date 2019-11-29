<?php

namespace App\Repository;

use App\Entity\RepairCommentary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RepairCommentary|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairCommentary|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairCommentary[]    findAll()
 * @method RepairCommentary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairCommentaryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairCommentary::class);
    }

    // /**
    //  * @return RepairCommentary[] Returns an array of RepairCommentary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RepairCommentary
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
