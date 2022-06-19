<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Lignefraishorsforfait;

class LigneFraishorsforfaitFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $lignefraishorsforfait = new Lignefraishorsforfait();        
        $lignefraishorsforfait->setIdfiche($this->getReference(FicheFraisFixtures::FICHEFRAIS_ID_REFERENCE));
        $lignefraishorsforfait->setLibelle("repas gastronomique");
        $lignefraishorsforfait->setDate(new \DateTime("2022-03-10"));
        $lignefraishorsforfait->setMontant("1000");       
             
        $manager->persist($lignefraishorsforfait);
        $manager->flush();
    }
    
     public function getDependencies ()
    {
        return array (
            FicheFraisFixtures:: class,   
            
            );
    }
}
