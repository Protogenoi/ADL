<?php

namespace App\Repository;

use App\Entity\Clients;
use App\Entity\Policy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Clients|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clients|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clients[]    findAll()
 * @method Clients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Clients::class);
    }

    /**
     * @param null|string $term
     */
    public function getWithSearchQueryBuilder(?string $term): QueryBuilder
    {

        $qb = $this->createQueryBuilder('c');

    if($term) {
        $qb->andWhere('c.firstName LIKE :term OR c.lastName LIKE :term OR c.firstName2 LIKE :term OR c.lastName2 LIKE :term OR c.phoneNumber LIKE :term OR c.postcode LIKE :term OR c.owner LIKE :term')
        ->setParameter('term', '%'.$term.'%');
    }

    return $qb
        ->orderBy('c.addedDate', 'DESC');


    }

    public function findAllMissingUploads(
        $option
    ): QueryBuilder {

        $qb = $this->createQueryBuilder('c')
            ->LEFTJoin('c.uploads', 'a');

        if ($option) {

            $qb->andWhere('a.type = :option')
                ->setParameter('option', $option);
        }

        return $qb
            ->orderBy('c.addedDate', 'DESC');


    }

//    /**
//     * @return Clients[] Returns an array of Clients objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Clients
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
