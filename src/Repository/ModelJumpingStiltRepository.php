<?php

namespace App\Repository;

use App\Entity\ModelJumpingStilt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ModelJumpingStilt|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelJumpingStilt|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelJumpingStilt[]    findAll()
 * @method ModelJumpingStilt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelJumpingStiltRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelJumpingStilt::class);
    }

    // /**
    //  * @return ModelJumpingStilt[] Returns an array of ModelJumpingStilt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModelJumpingStilt
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
