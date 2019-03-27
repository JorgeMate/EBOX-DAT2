<?php

namespace App\Repository;

use App\Entity\Formato;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Formato|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formato|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formato[]    findAll()
 * @method Formato[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormatoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Formato::class);
    }

    // /**
    //  * @return Formato[] Returns an array of Formato objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Formato
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
