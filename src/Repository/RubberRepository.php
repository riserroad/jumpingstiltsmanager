<?php

namespace App\Repository;

use App\Entity\Rubber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Rubber|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rubber|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rubber[]    findAll()
 * @method Rubber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RubberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rubber::class);
    }

    // /**
    //  * @return Rubber[] Returns an array of Rubber objects
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
    public function findOneBySomeField($value): ?Rubber
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
