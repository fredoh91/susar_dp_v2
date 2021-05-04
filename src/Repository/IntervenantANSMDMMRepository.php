<?php

namespace App\Repository;

use App\Entity\IntervenantANSMDMM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IntervenantANSMDMM|null find($id, $lockMode = null, $lockVersion = null)
 * @method IntervenantANSMDMM|null findOneBy(array $criteria, array $orderBy = null)
 * @method IntervenantANSMDMM[]    findAll()
 * @method IntervenantANSMDMM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntervenantANSMDMMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IntervenantANSMDMM::class);
    }

    /**
     * @return IntervenantANSMDMM[] Returns an array of IntervenantANSMDMM objects
     */
    
    public function findDMMactif()
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
    //  * @return IntervenantANSMDMM[] Returns an array of IntervenantANSMDMM objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IntervenantANSMDMM
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
