<?php

namespace App\Repository;

use App\Entity\Bergerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bergerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bergerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bergerie[]    findAll()
 * @method Bergerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BergerieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bergerie::class);
    }

//    /**
//     * @return Bergerie[] Returns an array of Bergerie objects
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
    public function findOneBySomeField($value): ?Bergerie
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
