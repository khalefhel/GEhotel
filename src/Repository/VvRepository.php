<?php

namespace App\Repository;

use App\Entity\Vv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Vv>
 *
 * @method Vv|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vv|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vv[]    findAll()
 * @method Vv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vv::class);
    }

//    /**
//     * @return Vv[] Returns an array of Vv objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Vv
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
