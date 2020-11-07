<?php

namespace App\Repository;

use App\Entity\Copy;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Copy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Copy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Copy[]    findAll()
 * @method Copy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CopyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Copy::class);
    }

    // /**
    //  * @return Copy[] Returns an array of Copy objects
    //  */

    public function findLast6Copies()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c')
            ->from(Copy::class, 'c')
            ->add('orderBy', 'c.creationDate DESC')
            ->setMaxResults(6);
            //->where('c.vendor = :user')
            // ->andWhere('p.published = :published')

        return $qb->getQuery()->getResult();
    }

    public function getCopiesByUser(User $user)
    {
        $limit = 10;
        $offset = 0;

        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c')
            ->from(Copy::class, 'c')
            ->add('orderBy', 'c.creationDate DESC')
            ->where('c.vendor = :user')
            // ->andWhere('p.published = :published')
            ->setParameters(['user' => $user])
            ->setFirstResult($offset)
            ->setMaxResults($limit);
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function getCopiesForSale()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c')
            ->from(Copy::class, 'c')
            //->add('orderBy', 'c.creationDate DESC')
            ->where('c.dateOfSale is NULL');
        $result = $qb->getQuery()->getResult();

        return $result;
    }


    // /**
    //  * @return Copy[] Returns an array of Copy objects
    //  */
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
    public function findOneBySomeField($value): ?Copy
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
