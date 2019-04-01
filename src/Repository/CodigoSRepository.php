<?php

namespace App\Repository;

use App\Entity\CodigoS;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CodigoS|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodigoS|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodigoS[]    findAll()
 * @method CodigoS[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodigoSRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CodigoS::class);
    }

    // /**
    //  * @return CodigoS[] Returns an array of CodigoS objects
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
    public function findOneBySomeField($value): ?CodigoS
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
