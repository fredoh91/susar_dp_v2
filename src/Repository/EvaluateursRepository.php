<?php

namespace App\Repository;

use App\Entity\Evaluateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Evaluateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evaluateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evaluateurs[]    findAll()
 * @method Evaluateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evaluateurs::class);
    }

    /**
     * @return Evaluateurs[] Returns an array of Evaluateurs objects
     */
    
    public function findByDMM_id( $value ): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.DMM = :val')
            ->setParameter('val', $value)
            // ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    // /**
    //  * @return Evaluateurs[] Returns an array of Evaluateurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evaluateurs
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
