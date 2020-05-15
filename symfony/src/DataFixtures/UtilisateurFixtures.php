<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use App\Service\UtilisateurService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UtilisateurFixtures extends Fixture
{
    protected $utilisateurService;

    public function __construct(UtilisateurService $utilisateurService)
    {
        $this->utilisateurService = $utilisateurService;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new Utilisateur();
        $user->setEmail('user@gmail.com');
        $user->setNom('user');
        $user->setPrenom('user');
        $user->setTelephone('06541424');
        $user->setDateDeNaissance(new \DateTime('2000-12-1'));
        $user->setPlainPassword("j_ai_la_banane");
        $this->utilisateurService->save($user);


        $user = new Utilisateur();
        $user->setEmail('admin@gmail.com');
        $user->setNom('Admin');
        $user->setPrenom('Admin');
        $user->setTelephone('06541424');
        $user->setDateDeNaissance(new \DateTime('2000-12-1'));
        $user->setPlainPassword("admin");
        $user->setRoles(["ROLE_ADMIN"]);
        $this->utilisateurService->save($user);


    }

}
