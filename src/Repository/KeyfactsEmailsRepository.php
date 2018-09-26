<?php

namespace App\Repository;

use App\Entity\KeyfactsEmails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method KeyfactsEmails|null find($id, $lockMode = null, $lockVersion = null)
 * @method KeyfactsEmails|null findOneBy(array $criteria, array $orderBy = null)
 * @method KeyfactsEmails[]    findAll()
 * @method KeyfactsEmails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KeyfactsEmailsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, KeyfactsEmails::class);
    }

    public function KeyfactsEmailReport(
        $option
    ) {

        $conn = $this->getEntityManager()
            ->getConnection();


        if ($option == 'Keyfacts no attempts') {

            $sql
                = 'SELECT clients.id, clients.email, clients.added_date, clients.title, clients.first_name, clients.last_name, clients.title2, clients.first_name2, clients.last_name2, ANY_VALUE(policy.closer) as closer FROM clients LEFT JOIN policy ON clients.id = policy.client_id WHERE clients.email NOT IN (SELECT Keyfacts_Emails.email FROM Keyfacts_Emails) GROUP BY clients.id ORDER BY clients.added_date';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':option', $option);

        } else {

            $sql
                = 'SELECT added_date, email, added_by FROM Keyfacts_Emails';
            $stmt = $conn->prepare($sql);

        }


        $stmt->execute();
        return $stmt->fetchAll();


    }


//    /**
//     * @return KeyfactsEmails[] Returns an array of KeyfactsEmails objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KeyfactsEmails
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
