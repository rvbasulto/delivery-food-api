<?php

namespace App\Repository;

use App\Entity\ImagesPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImagesPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesPlace[]    findAll()
 * @method ImagesPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesPlace::class);
    }

    // /**
    //  * @return ImagesPlace[] Returns an array of ImagesPlace objects
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
    public function findOneBySomeField($value): ?ImagesPlace
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
