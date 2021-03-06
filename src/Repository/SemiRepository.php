<?php

namespace App\Repository;

use App\Entity\Semi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Semi|null find($id, $lockMode = null, $lockVersion = null)
 * @method Semi|null findOneBy(array $criteria, array $orderBy = null)
 * @method Semi[]    findAll()
 * @method Semi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SemiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Semi::class);
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
    //  * @return Semi[] Returns an array of Semi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Semi
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
