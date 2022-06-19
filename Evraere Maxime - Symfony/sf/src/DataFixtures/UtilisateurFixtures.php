<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Utilisateur;
use App\DataFixtures\CategorieFixtures;


class UtilisateurFixtures extends Fixture implements DependentFixtureInterface
{
    public const USER_ID_REFERENCE = 'id-utili' ;
    
    public function load(ObjectManager $manager): void
    {
             
        $unUtili = new Utilisateur();   
        $unUtili->setId('u1');
        $unUtili->setPrenom('Terry');
        $unUtili->setNom('Dicule');        
        $unUtili->setAdresse('25, rue du jambon');
        $unUtili->setCp('25');
        $unUtili->setVille('Leport');
        $unUtili->setDateembauche(new \DateTime('2019-10-01'));
        $unUtili->setLaCategorie($this->getReference(CategorieFixtures::CAT_ID_REFERENCE));
        
        $manager->persist($unUtili);      
        $manager->flush();
        
        $this->addReference(UtilisateurFixtures::USER_ID_REFERENCE, $unUtili);
    }
    
    public function getDependencies ()
    {
        return array (
            CategorieFixtures:: class,   
            
            );
    }
}
