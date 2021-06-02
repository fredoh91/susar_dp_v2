<?php

namespace App\Repository;

use App\Entity\TypeMesureAction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeMesureAction|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMesureAction|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMesureAction[]    findAll()
 * @method TypeMesureAction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMesureActionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeMesureAction::class);
    }

    /**
     * @return TypeMesureAction[] Returns an array of TypeMesureAction objects
     */
    
    public function findMesActactif()
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.FlActif = :val')
            ->setParameter('val', true)
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    // /**
    //  * @return TypeMesureAction[] Returns an array of TypeMesureAction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeMesureAction
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
