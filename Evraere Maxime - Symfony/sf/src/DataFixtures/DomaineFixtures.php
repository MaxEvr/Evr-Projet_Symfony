<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Domaine;

class DomaineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $unDom = new Domaine();       
        $unDom->setNomDomaine('Administratif');    
        
        $unDom2 = new Domaine();        
        $unDom2->setNomDomaine('Extérieur');
        
        $unDom3 = new Domaine();        
        $unDom3->setNomDomaine('Test');
        
        $manager->persist($unDom);        
        $manager->persist($unDom2);
        $manager->persist($unDom3);
        $manager->flush();
    }
}

