<?php

namespace App\Repository;

use App\Entity\HotelId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HotelId>
 *
 * @method HotelId|null find($id, $lockMode = null, $lockVersion = null)
 * @method HotelId|null findOneBy(array $criteria, array $orderBy = null)
 * @method HotelId[]    findAll()
 * @method HotelId[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelIdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HotelId::class);
    }

//    /**
//     * @return HotelId[] Returns an array of HotelId objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HotelId
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
