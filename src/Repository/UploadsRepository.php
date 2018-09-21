<?php

namespace App\Repository;

use App\Entity\Uploads;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uploads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uploads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uploads[]    findAll()
 * @method Uploads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uploads::class);
    }


    /*    public function findAllMissingUploads(
            $option
        ): QueryBuilder {

            $qb = $this->createQueryBuilder('c');


            if ($option) {

                $qb->andWhere('c.type = :option')
                    ->setParameter('option', $option);
            }

            return $qb
                ->orderBy('c.addedDate', 'DESC');


        }*/

//    /**
//     * @return Uploads[] Returns an array of Uploads objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uploads
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
