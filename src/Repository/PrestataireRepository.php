<?php

namespace App\Repository;

use App\Entity\CategorieDeServices;
use App\Entity\Prestataire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prestataire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestataire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestataire[]    findAll()
 * @method Prestataire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestataireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestataire::class);
    }

    /**
     * @return Prestataire[]
     */
    public function findAllWithJoins($localite){
        $qb = $this->createQueryBuilder('p')
            ->innerJoin('p.CategorieDeServices', 's')
            ->leftJoin('p.Utilisateur', 'u')
            ->leftJoin('u.localite', 'l')
            ->andWhere('l.localite = :val')
            ->setParameter('val', $localite);


        $query = $qb->getQuery();
        return $query->getResult();
    }

    public function findByCommune($commune){
        $qb = $this->createQueryBuilder('p');
        $qb->leftJoin('p.commune', 'communes')
            ->where('communes = :commune')
            ->setParameter(':commune', $commune);
        //$qb->orderBy('p.commune');
        return $qb->getQuery()->getResult();
    }

    public function findByService(CategorieDeServices $service)
    {
        $qb=$this->createQueryBuilder('p');

        $qb->leftJoin('p.categorieServices', 'services');
        $qb->where('services = :service')
            ->setParameter(':service', $service);
        return $qb->getQuery()->getResult();
    }

    public function findByPrestaCommuneService($nomPrestataire, $commune, $service){
        $qb=$this->createQueryBuilder('p');
        if($nomPrestataire!= null) {
            $qb->where('p.nom = :nom')
                ->setParameter(':nom', $nomPrestataire);
        }
        if($commune != null) {
            $qb->innerJoin('p.commune', 'communes')
                ->andWhere('communes.commune = :commune')
                ->setParameter(':commune', $commune);
        }
        if($service != null) {
            $qb->leftJoin('p.CategorieDeServices', 'services')
                ->andWhere('services = :service')
                ->setParameter(':service', $service);
        }
        return $qb->getQuery()->getResult();
    }

    public function lastsPrestataires()
    {
        $qb=$this->createQueryBuilder('p')
            //->where('p.nom != null')
            ->orderBy('p.id','DESC')
            ->setFirstResult(0)
            ->setMaxResults(6);
        return $qb->getQuery()->getResult();
    }


    // /**
    //  * @return Prestataire[] Returns an array of Prestataire objects
    //  */
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
    public function findOneBySomeField($value): ?Prestataire
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
