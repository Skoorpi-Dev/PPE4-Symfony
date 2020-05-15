<?php

namespace App\Controller;

use App\Entity\Associer;
use App\Form\AssocierType;
use App\Repository\AssocierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/associer")
 */
class AssocierController extends AbstractController
{
    /**
     * @Route("/", name="associer_index", methods={"GET"})
     */
    public function index(AssocierRepository $associerRepository): Response
    {
        return $this->render('associer/index.html.twig', [
            'associers' => $associerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="associer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $associer = new Associer();
        $form = $this->createForm(AssocierType::class, $associer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($associer);
            $entityManager->flush();

            return $this->redirectToRoute('associer_index');
        }

        return $this->render('associer/new.html.twig', [
            'associer' => $associer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="associer_show", methods={"GET"})
     */
    public function show(Associer $associer): Response
    {
        return $this->render('associer/show.html.twig', [
            'associer' => $associer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="associer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Associer $associer): Response
    {
        $form = $this->createForm(AssocierType::class, $associer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('associer_index');
        }

        return $this->render('associer/edit.html.twig', [
            'associer' => $associer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="associer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Associer $associer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$associer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($associer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('associer_index');
    }
}
