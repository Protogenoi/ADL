<?php

namespace App\Repository;

use App\Entity\AegonPolicy;
use App\Entity\Policy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AegonPolicy|null find($id, $lockMode = null, $lockVersion = null)
 * @method AegonPolicy|null findOneBy(array $criteria, array $orderBy = null)
 * @method AegonPolicy[]    findAll()
 * @method AegonPolicy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AegonPolicyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AegonPolicy::class);
    }

    /**
     * @param int|string $slug
     * @return Policy[]
     */

    public function findAllWithSearch(?string $term)
    {
        $CID = $this->createQueryBuilder('c')
        ->innerJoin('c.policy', 'a');

        if($term) {
            $CID->andWhere('c.reference = :term')
            ->setParameter('term',$term)
            ;

            return $CID
                ->orderBy('c.id','DESC')
                ->getQuery()
                ->getResult();
        }

    }

/*    public function GetAegonPoliciesByIdQueryBuilder(?int $slug)
    {

        $qb= $this->createQueryBuilder('c')
            ->leftJoin('c.policy', 'a');

        if($slug) {
            $qb->andWhere('a.policy = :term')
                ->setParameter('term', $slug);
        }

        return $qb
            ->orderBy('a.addedDate', 'DESC');

    }*/

//    /**
//     * @return AegonPolicy[] Returns an array of AegonPolicy objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AegonPolicy
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
