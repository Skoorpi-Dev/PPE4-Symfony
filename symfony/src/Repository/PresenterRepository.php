<?php

namespace App\Repository;

use App\Entity\Presenter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Presenter|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presenter|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presenter[]    findAll()
 * @method Presenter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresenterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Presenter::class);
    }

    // /**
    //  * @return Presenter[] Returns an array of Presenter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Presenter
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
