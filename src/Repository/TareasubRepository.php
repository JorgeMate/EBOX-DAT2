<?php

namespace App\Repository;

use App\Entity\Tareasub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tareasub|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tareasub|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tareasub[]    findAll()
 * @method Tareasub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TareasubRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tareasub::class);
    }

    // /**
    //  * @return Tareasub[] Returns an array of Tareasub objects
    //  */
    /*
    */

    public function findByTareaField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.tarea = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Tareasub
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
