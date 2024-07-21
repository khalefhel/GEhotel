<?php

namespace App\Repository;

use App\Entity\Azul;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Azul>
 *
 * @method Azul|null find($id, $lockMode = null, $lockVersion = null)
 * @method Azul|null findOneBy(array $criteria, array $orderBy = null)
 * @method Azul[]    findAll()
 * @method Azul[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AzulRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Azul::class);
    }

//    /**
//     * @return Azul[] Returns an array of Azul objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Azul
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
