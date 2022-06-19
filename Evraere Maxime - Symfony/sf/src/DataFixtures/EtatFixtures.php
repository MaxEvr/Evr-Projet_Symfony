<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Etat;

class EtatFixtures extends Fixture
{
     public const ETAT_ID_REFERENCE = 'id-etat' ;
    
    public function load(ObjectManager $manager): void
    {
        $unEtat = new Etat();   
        $unEtat->setId('SA');
        $unEtat->setLibelle('Saisie');    
        
        $unEtat2 = new Etat();
        $unEtat2->setId('EN');
        $unEtat2->setLibelle('Enregistré');
        
        $manager->persist($unEtat);        
        $manager->persist($unEtat2);
        
        $manager->flush();
        
        $this->addReference(EtatFixtures::ETAT_ID_REFERENCE, $unEtat2);
    }
    
    
}
