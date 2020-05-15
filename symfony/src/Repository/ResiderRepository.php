<?php

namespace App\Repository;

use App\Entity\Resider;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Resider|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resider|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resider[]    findAll()
 * @method Resider[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResiderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resider::class);
    }

    // /**
    //  * @return Resider[] Returns an array of Resider objects
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
    public function findOneBySomeField($value): ?Resider
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
