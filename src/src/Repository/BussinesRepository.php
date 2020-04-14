<?php

namespace App\Repository;

use App\Entity\Bussines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Bussines|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bussines|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bussines[]    findAll()
 * @method Bussines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BussinesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bussines::class);
    }

    // /**
    //  * @return Bussines[] Returns an array of Bussines objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bussines
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
