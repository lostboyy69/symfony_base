<?php
namespace App\DataFixtures;
 
use App\Entity\Commentaire;
use App\Entity\Product;
use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class CommentaireFixtures extends Fixture
{
    private const COMMENTAIRE_REFERENCE = 'Commentaire';
    
    public function load(ObjectManager $manager)
    {
        $nomsCommentaires = [
            'Commentaire Blanc',
            'Commentaire Rouge'
        ];
 
        foreach ($nomsCommentaires as $key => $nomCommentaire) {
            $commentaire = new Commentaire();
            $commentaire->setDescription($nomCommentaire);
            $manager->persist($commentaire);
            $this->addReference(self::COMMENTAIRE_REFERENCE . '_' . $key, $commentaire);
        }
 
        $manager->flush();
    }
}