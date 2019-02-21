<?php

namespace App\Repository;

use App\Entity\Timeline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Timeline|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timeline|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timeline[]    findAll()
 * @method Timeline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimelineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Timeline::class);
    }


    public function updateClientTimeline($CID, $option)
    {
        $conn = $this->getEntityManager()
            ->getConnection();

        $sql
            = 'UPDATE timeline set note_type="Client updated", message=:OPTION, added_by=:ADDED_BY WHERE client=:CID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':CID', $CID);
        $stmt->bindParam(':OPTION', $option);

        $stmt->execute();
        return $stmt->fetchAll();

    }

//    /**
//     * @return Timeline[] Returns an array of Timeline objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Timeline
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
