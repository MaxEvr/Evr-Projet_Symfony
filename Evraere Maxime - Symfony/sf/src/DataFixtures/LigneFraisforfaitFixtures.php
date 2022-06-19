<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Lignefraisforfait;
use App\DataFixtures\FicheFraisFixtures;
use App\DataFixtures\FraisforfaitFixtures;

class LigneFraisforfaitFixtures extends Fixture implements DependentFixtureInterface
{
    
    
    public function load(ObjectManager $manager): void
    {
        
        $ligneFraisforfait = new Lignefraisforfait();        
        $ligneFraisforfait->setIdfiche($this->getReference(FicheFraisFixtures::FICHEFRAIS_ID_REFERENCE));              
        $ligneFraisforfait->setIdfraisforfait($this->getReference(FraisforfaitFixtures::FRAISFORFAIT_ID_REFERENCE));
        $ligneFraisforfait->setQuantite(12);
              
        
        $ligneFraisforfait2 = new Lignefraisforfait();        
        $ligneFraisforfait2->setIdfiche($this->getReference(FicheFraisFixtures::FICHEFRAIS2_ID_REFERENCE));              
        $ligneFraisforfait2->setIdfraisforfait($this->getReference(FraisforfaitFixtures::FRAISFORFAIT2_ID_REFERENCE));
        $ligneFraisforfait2->setQuantite(3);
        
        $manager->persist($ligneFraisforfait);
        $manager->persist($ligneFraisforfait2);
        $manager->flush();
    }
    
    public function getDependencies ()
    {
        return array (
            FicheFraisFixtures:: class,
            FraisforfaitFixtures:: class,
            
            );
    }
}


