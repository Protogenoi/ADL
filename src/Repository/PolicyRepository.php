<?php

namespace App\Repository;

use App\Entity\Policy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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

    public function BLANKBANKL(?string $term)
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

    public function findAllPolicyWithSearch(?string $term): QueryBuilder
    {

        $qb = $this->createQueryBuilder('c');

        if ($term) {
            $qb->andWhere('c.insurer LIKE :term OR c.reference LIKE :term OR c.status LIKE :term OR c.policyHolder LIKE :term OR c.subDate LIKE :term OR c.saleDate LIKE :term')
                ->setParameter('term', '%' . $term . '%');
        }

        return $qb
            ->orderBy('c.saleDate', 'DESC');


    }

    public function findAllPolicySalesWithSearch(
        $datefrom,
        $dateto
    ): QueryBuilder {

        $qb = $this->createQueryBuilder('c');


        if ($datefrom) {

            $datefrom = new \DateTime($datefrom . " 00:00:00");
            $dateto = new \DateTime($dateto . " 23:59:59");

            $qb->andWhere('c.saleDate BETWEEN :datefrom AND :dateto')
                ->setParameter('datefrom', $datefrom)
                ->setParameter('dateto', $dateto);
        }

        return $qb
            ->orderBy('c.saleDate', 'DESC');


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
