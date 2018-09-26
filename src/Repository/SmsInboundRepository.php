<?php

namespace App\Repository;

use App\Entity\SmsInbound;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SmsInbound|null find($id, $lockMode = null, $lockVersion = null)
 * @method SmsInbound|null findOneBy(array $criteria, array $orderBy = null)
 * @method SmsInbound[]    findAll()
 * @method SmsInbound[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmsInboundRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SmsInbound::class);
    }

//    /**
//     * @return SmsInbound[] Returns an array of SmsInbound objects
//     */
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
    public function findOneBySomeField($value): ?SmsInbound
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
