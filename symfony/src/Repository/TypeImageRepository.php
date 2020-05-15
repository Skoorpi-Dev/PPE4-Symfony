<?php

namespace App\Repository;

use App\Entity\TypeImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeImage[]    findAll()
 * @method TypeImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeImage::class);
    }

    // /**
    //  * @return TypeImage[] Returns an array of TypeImage objects
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
    public function findOneBySomeField($value): ?TypeImage
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
