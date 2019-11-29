<?php

namespace App\Repository;

use App\Entity\Riser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Riser|null find($id, $lockMode = null, $lockVersion = null)
 * @method Riser|null findOneBy(array $criteria, array $orderBy = null)
 * @method Riser[]    findAll()
 * @method Riser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RiserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Riser::class);
    }

    // /**
    //  * @return Riser[] Returns an array of Riser objects
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
    public function findOneBySomeField($value): ?Riser
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
