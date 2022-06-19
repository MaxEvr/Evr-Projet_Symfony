<?php 

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Fichefrais;
use App\Entity\Utilisateur;
use App\Entity\Etat;
use App\DataFixtures\EtatFixtures;
use App\DataFixtures\UtilisateurFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FicheFraisFixtures extends Fixture implements DependentFixtureInterface
{
    public const FICHEFRAIS_ID_REFERENCE = 'id-fiche1';    
    public const FICHEFRAIS2_ID_REFERENCE = 'id-fiche2';
    
    public function load(ObjectManager $manager): void
    {
        $uneFicheFrais = new Fichefrais();        
        $uneFicheFrais->setIdutilisateur($this->getReference(UtilisateurFixtures::USER_ID_REFERENCE));
        $uneFicheFrais->setMois('202011');
        $uneFicheFrais->setNbjustificatifs(2);
        $uneFicheFrais->setIdetat($this->getReference(EtatFixtures::ETAT_ID_REFERENCE));        
        
        $uneFicheFrais2 = new Fichefrais();        
        $uneFicheFrais2->setIdutilisateur($this->getReference(UtilisateurFixtures::USER_ID_REFERENCE));
        $uneFicheFrais2->setMois('202010');
        $uneFicheFrais2->setNbjustificatifs(1);
        $uneFicheFrais2->setMontantvalide(1000);
        $uneFicheFrais2->setIdetat($this->getReference(EtatFixtures::ETAT_ID_REFERENCE));
                
        $manager->persist($uneFicheFrais);
        $manager->persist($uneFicheFrais2);
        $manager->flush();
        
        $this->addReference(FicheFraisFixtures::FICHEFRAIS_ID_REFERENCE, $uneFicheFrais);
        $this->addReference(FicheFraisFixtures::FICHEFRAIS2_ID_REFERENCE, $uneFicheFrais2);
    
    }
    
    
    public function getDependencies ()
    {
        return array (
            UtilisateurFixtures :: class,
            EtatFixtures :: class,
            
            );
    }    
    
}
