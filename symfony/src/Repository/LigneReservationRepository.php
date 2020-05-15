<?php

namespace App\Repository;

use App\Entity\LigneReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LigneReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneReservation[]    findAll()
 * @method LigneReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneReservation::class);
    }

    // /**
    //  * @return LigneReservation[] Returns an array of LigneReservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneReservation
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
