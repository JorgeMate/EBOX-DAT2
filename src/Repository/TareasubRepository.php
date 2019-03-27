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
    //  * @return Tareasub|null Returns a Tareasub object
    //  */
    /*
    */

    public function findByTareasubField($value)
    {
        $QueryBuilder = $this->createQueryBuilder('t')
            ->innerJoin('t.tarea','tp')
            ->andWhere('t.id = :val')
            ->setParameter('val', $value)
            ->select('t.tareasub as subtarea', 'tp.tarea as tarea')

            ->getQuery()
            ->getOneOrNullResult()
        ;

        return $QueryBuilder;

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
