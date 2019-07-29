<?php

namespace App\Repository;

use App\Entity\Script;
use App\Entity\Movie;
use App\Controller;
use App\Service;
use App\Service\ScriptMetrics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ScriptMetrics|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScriptMetrics|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScriptMetrics[]    findAll()
 * @method ScriptMetrics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScriptMetricsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ScriptMetrics::class);
    }

    // /**
    //  * @return ScriptMetrics[] Returns an array of ScriptMetrics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScriptMetrics
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
