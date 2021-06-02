<?php

namespace App\Repository;

use App\Entity\UtilisateurEvalDP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UtilisateurEvalDP|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtilisateurEvalDP|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtilisateurEvalDP[]    findAll()
 * @method UtilisateurEvalDP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurEvalDPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateurEvalDP::class);
    }

    /**
     * @return UtilisateurEvalDP[] Returns an array of UtilisateurEvalDP objects
     */
    
    public function findUtilEvalDPactif()
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
    //  * @return UtilisateurEvalDP[] Returns an array of UtilisateurEvalDP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UtilisateurEvalDP
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
