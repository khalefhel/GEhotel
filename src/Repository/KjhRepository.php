<?php

namespace App\Repository;

use App\Entity\Kjh;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kjh>
 *
 * @method Kjh|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kjh|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kjh[]    findAll()
 * @method Kjh[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KjhRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kjh::class);
    }

//    /**
//     * @return Kjh[] Returns an array of Kjh objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Kjh
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
