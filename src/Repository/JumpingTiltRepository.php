<?php

namespace App\Repository;

use App\Entity\JumpingTilt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JumpingTilt|null find($id, $lockMode = null, $lockVersion = null)
 * @method JumpingTilt|null findOneBy(array $criteria, array $orderBy = null)
 * @method JumpingTilt[]    findAll()
 * @method JumpingTilt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JumpingTiltRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JumpingTilt::class);
    }

    // /**
    //  * @return JumpingTilt[] Returns an array of JumpingTilt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JumpingTilt
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
