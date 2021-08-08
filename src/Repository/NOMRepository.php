<?php

namespace App\Repository;

use App\Entity\NOM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NOM|null find($id, $lockMode = null, $lockVersion = null)
 * @method NOM|null findOneBy(array $criteria, array $orderBy = null)
 * @method NOM[]    findAll()
 * @method NOM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NOMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NOM::class);
    }

    // /**
    //  * @return NOM[] Returns an array of NOM objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NOM
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
