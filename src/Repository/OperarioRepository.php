<?php

namespace App\Repository;

use App\Entity\Operario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Operario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Operario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Operario[]    findAll()
 * @method Operario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Operario::class);
    }

    public function findOneByIname($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.iname = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    // /**
    //  * @return Operario[] Returns an array of Operario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Operario
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
