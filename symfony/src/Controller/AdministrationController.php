<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministrationController extends AbstractController
{
    /**
     * @Route("/administration",name="administration")
     */
    public function backoffice(){
        return $this->render("administration/index.html.twig",[
            'controller_name' => 'AdministrationController',
        ]);
    }

}