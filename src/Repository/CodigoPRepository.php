<?php

namespace App\Repository;

use App\Entity\CodigoP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CodigoP|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodigoP|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodigoP[]    findAll()
 * @method CodigoP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodigoPRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CodigoP::class);
    }

    // /**
    //  * @return CodigoP[] Returns an array of CodigoP objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CodigoP
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
