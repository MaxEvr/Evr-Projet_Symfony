<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Fraisforfait;

class FraisforfaitFixtures extends Fixture
{
    public const FRAISFORFAIT_ID_REFERENCE = 'id-frais' ;
    public const FRAISFORFAIT2_ID_REFERENCE = 'id-frais2' ;
    
    public function load(ObjectManager $manager): void
    {
        $unFraisforfait = new Fraisforfait();   
        $unFraisforfait->setId('SE');
        $unFraisforfait->setLibelle('prix semaine');
        $unFraisforfait->setMontant(50);
        
        $unFraisforfait2 = new Fraisforfait();   
        $unFraisforfait2->setId('WE');
        $unFraisforfait2->setLibelle('prix week-end');
        $unFraisforfait2->setMontant(80);
        
        $manager->persist($unFraisforfait);        
        $manager->persist($unFraisforfait2);
        
        $manager->flush();
        
        $this->addReference(self::FRAISFORFAIT_ID_REFERENCE, $unFraisforfait);
        $this->addReference(self::FRAISFORFAIT2_ID_REFERENCE, $unFraisforfait2);
    }
}
