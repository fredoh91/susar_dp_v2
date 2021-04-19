<?php

namespace App\Repository;

use App\Entity\DP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DP|null find($id, $lockMode = null, $lockVersion = null)
 * @method DP|null findOneBy(array $criteria, array $orderBy = null)
 * @method DP[]    findAll()
 * @method DP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DP::class);
    }

    // /**
    //  * @return DP[] Returns an array of DP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DP
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
