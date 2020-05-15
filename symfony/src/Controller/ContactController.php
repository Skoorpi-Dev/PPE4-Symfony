<?php

// src/Controller/ContactController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// On importe le modèle et le type qu'on va utiliser
use App\Form\Model\Contact;
use App\Form\Type\ContactType;

class ContactController extends AbstractController
{
    /**
     * My first contact page
     *
     * @param Request $request the Symfony request
     *
     * @return Response
     */
    public function contact(Request $request)
    {

        // Instance du modele
        $contact = new Contact();

        // On force que ce soit le sujet b juste pour le plaisir de modifier le modèle
        $contact->setSubject("b");

        // On utilise la méthode createForm de AbstractController
        // qui permet de créer un formulaire à partir d'un namespace d'un type de formulaire
        // et d'une instance du modèle associé
        // Le dernier paramètre [] sont les options du formulaire, qu'on n’utilisera pas
        $form = $this->createForm(ContactType::class, $contact, []);


        // On fait la transformation twig en html en passant le formulaire à la vue
        // Néanmoins, on utilise la méthode createView pour que le formulaire passe en mode
        // affichage et soit utilisable dans un twig
        return $this->render("contact/index.html.twig", [
            'form' => $form->createView(),
        ]);
    }
}
