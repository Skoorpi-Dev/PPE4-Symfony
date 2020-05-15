<?php

namespace App\Service;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurService
{
    protected $em;
    protected $repository;
    protected $passwordEncoder;

    /**
     * UtilisateurService constructor.
     *
     * @param EntityManagerInterface $em by dependency injection
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->em = $em;
        $this->repository = $this->em->getRepository(Utilisateur::class);
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Set a password encoded to a user
     *
     * @param Utilisateur $utilisateur
     * @return Utilisateur
     */
    protected function encodePassword(Utilisateur $utilisateur)
    {
        $plainPassword = $utilisateur->getPlainPassword();

        if (!empty($plainPassword)) {
            $utilisateur->setPassword($this->passwordEncoder->encodePassword(
                $utilisateur,
                $plainPassword
            ));
        }

        return $utilisateur;
    }


    /**
     * Delete a Utilisateur object in bdd
     *
     * @param Utilisateur $utilisateur
     */
    public function delete(Utilisateur $utilisateur)
    {
        $this->em->remove($utilisateur);
        $this->em->flush();
    }


    /**
     * Save a Utilisateur object in bdd
     *
     * @param Utilisateur $utilisateur
     */
    public function save(Utilisateur $utilisateur)
    {
        $utilisateur = $this->encodePassword($utilisateur);
        $this->em->persist($utilisateur);
        $this->em->flush();
    }
}
