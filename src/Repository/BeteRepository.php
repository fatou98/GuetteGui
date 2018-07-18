<?php

namespace App\Repository;

use App\Entity\Bete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bete[]    findAll()
 * @method Bete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BeteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bete::class);
    }

//    /**
//     * @return Bete[] Returns an array of Bete objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bete
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
