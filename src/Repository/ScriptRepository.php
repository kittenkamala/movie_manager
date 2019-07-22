<?php

namespace App\Repository;

use App\Entity\Script;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Script|null find($id, $lockMode = null, $lockVersion = null)
 * @method Script|null findOneBy(array $criteria, array $orderBy = null)
 * @method Script[]    findAll()
 * @method Script[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScriptRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Script::class);
    }

    // /**
    //  * @return Script[] Returns an array of Script objects
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
    public function findOneBySomeField($value): ?Script
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
