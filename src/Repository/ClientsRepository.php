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
    ) {

        $conn = $this->getEntityManager()
            ->getConnection();


        if ($option == 'Sent SMS: Welcome') {

            $sql
                = 'SELECT clients.id, clients.added_date, clients.title, clients.first_name, clients.last_name, clients.title2, clients.first_name2, clients.last_name2 FROM clients JOIN timeline ON clients.id = timeline.client_id WHERE clients.id NOT IN (SELECT timeline.client_id WHERE timeline.notetype=:option) GROUP BY clients.id ORDER BY clients.added_date';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':option', $option);

        } else {

            $sql
                = 'SELECT clients.id, clients.added_date, clients.title, clients.first_name, clients.last_name, clients.title2, clients.first_name2, clients.last_name2 FROM clients JOIN uploads ON clients.id = uploads.client_id WHERE clients.id NOT IN (SELECT uploads.client_id WHERE uploads.type=:option) GROUP BY clients.id ORDER BY clients.added_date';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':option', $option);

        }


        $stmt->execute();
        return $stmt->fetchAll();


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
