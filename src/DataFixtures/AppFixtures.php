<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void{ 
    

        $contact = new Contact();
        $contact->setNom('Mialhe');
        $contact->setPrenom('Tiane');
        $contact->setEmail('tiane.mialhe@epsi.fr');
        $contact->setSujet('je meurs');
        $contact->setMessage('ça commence a me les briser');
        $contact->setNewsletter('bon c est chiant');

        $article = new Article();
        $article->setNom('Article Putaclick');
        $article->setSlug('j avoue');
        $article->setContenu('je sais pas');
        
        $manager->persist($article);
        $manager->persist($contact);
        $manager->flush();
    }
}
