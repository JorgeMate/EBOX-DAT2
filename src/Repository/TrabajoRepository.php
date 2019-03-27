<?php

namespace App\Repository;

use App\Entity\Trabajo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Trabajo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trabajo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trabajo[]    findAll()
 * @method Trabajo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrabajoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trabajo::class);
    }

    public function findAllByOrder($field, $order)
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.'.$field, $order)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Trabajo[] Returns an array of Trabajo objects
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
    public function findOneBySomeField($value): ?Trabajo
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
