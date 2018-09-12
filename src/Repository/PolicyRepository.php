<?php

namespace App\Repository;

use App\Entity\Policy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Policy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Policy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Policy[]    findAll()
 * @method Policy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolicyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Policy::class);
    }

    /**
     * @param int|string $slug
     * @return Policy[]
     */

    public function findAllPolicyWithSearch(?string $term)
    {
        $CID = $this->createQueryBuilder('c')
        ->Join('c.aegonPolicy','a')
        ->addSelect('a');

        if($term) {
            $CID->andWhere('c.client = :term')
                ->setParameter('term',$term)
            ;

            return $CID
                ->orderBy('c.id','DESC')
                ->getQuery()
                ->getResult();
        }
    }

//    /**
//     * @return Policy[] Returns an array of Policy objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Policy
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
