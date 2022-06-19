<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture 
{
    public const CAT_ID_REFERENCE = 'nom-cat' ;
    
    public function load(ObjectManager $manager): void
    {
        $uneCat = new Categorie();       
        $uneCat->setLibelle('Visiteur');    
        
        $uneCat2 = new Categorie();        
        $uneCat2->setLibelle('Laborantin');
        
        $uneCat3 = new Categorie();       
        $uneCat3->setLibelle('Dirigeant');    
        
        $uneCat4 = new Categorie();        
        $uneCat4->setLibelle('Comptable');
        
        $manager->persist($uneCat);        
        $manager->persist($uneCat2);
        $manager->persist($uneCat3);        
        $manager->persist($uneCat4);
        
        $manager->flush();
        
        $this->addReference(CategorieFixtures::CAT_ID_REFERENCE, $uneCat3);
    }
}
