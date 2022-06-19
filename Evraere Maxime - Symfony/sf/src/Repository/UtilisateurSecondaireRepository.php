<?php

namespace App\Repository;

use App\Entity\UtilisateurSecondaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UtilisateurSecondaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtilisateurSecondaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtilisateurSecondaire[]    findAll()
 * @method UtilisateurSecondaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurSecondaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateurSecondaire::class);
    }

    // /**
    //  * @return UtilisateurSecondaire[] Returns an array of UtilisateurSecondaire objects
    //  */
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
    public function findOneBySomeField($value): ?UtilisateurSecondaire
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    
     public function listeUtiliConcerne(){
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT f.id,u.nom,u.prenom,s.niveau FROM App\Entity\UtilisateurSecondaire s INNER JOIN App\Entity\Utilisateur u WITH u.id=s.idUtili INNER JOIN App\Entity\Fichefrais f WITH f.id=s.idFicheFrais");
        $laListe = $query->getResult();
        return $laListe;
    }
}
