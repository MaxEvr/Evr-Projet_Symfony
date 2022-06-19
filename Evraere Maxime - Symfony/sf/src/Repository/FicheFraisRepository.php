<?php

namespace App\Repository;

use App\Entity\Fichefrais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fichefrais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fichefrais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fichefrais[]    findAll()
 * @method Fichefrais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FicheFraisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fichefrais::class);
    }

    // /**
    //  * @return Fichefrais[] Returns an array of Fichefrais objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fichefrais
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
    
    public function listAyantFrais(){
       $em = $this->getEntityManager();
       $query = $em->createQuery("SELECT U.nom,U.prenom,SUM(F.montantvalide) as MontantValide FROM App\Entity\Fichefrais F INNER JOIN App\Entity\Utilisateur U WITH U.id=F.idutilisateur GROUP BY F.idutilisateur");
       $laListe = $query->getResult();
        return $laListe; 
        
    }
    
    public function listNAyantPasFrais(){
       $em = $this->getEntityManager();
       $query = $em->createQuery("SELECT U.nom,U.prenom FROM App\Entity\Utilisateur U LEFT OUTER JOIN App\Entity\Fichefrais F WITH U.id=F.idutilisateur WHERE F.montantvalide IS NULL");
       $laListe = $query->getResult();
        return $laListe; 
        
    }
    
    public function nbFrais(){
       $em = $this->getEntityManager();
       $query = $em->createQuery("SELECT U.nom,U.prenom, COUNT(F.id) as Nombre FROM App\Entity\Utilisateur U LEFT JOIN App\Entity\Fichefrais F WITH U.id=F.idutilisateur GROUP BY U.id");
       $laListe = $query->getResult();
        return $laListe; 
        
    }
}
