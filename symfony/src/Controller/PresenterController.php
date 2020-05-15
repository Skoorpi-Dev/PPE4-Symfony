<?php

namespace App\Controller;

use App\Entity\Presenter;
use App\Form\PresenterType;
use App\Repository\PresenterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/presenter")
 */
class PresenterController extends AbstractController
{
    /**
     * @Route("/", name="presenter_index", methods={"GET"})
     */
    public function index(PresenterRepository $presenterRepository): Response
    {
        return $this->render('presenter/index.html.twig', [
            'presenters' => $presenterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="presenter_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $presenter = new Presenter();
        $form = $this->createForm(PresenterType::class, $presenter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($presenter);
            $entityManager->flush();

            return $this->redirectToRoute('presenter_index');
        }

        return $this->render('presenter/new.html.twig', [
            'presenter' => $presenter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="presenter_show", methods={"GET"})
     */
    public function show(Presenter $presenter): Response
    {
        return $this->render('presenter/show.html.twig', [
            'presenter' => $presenter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="presenter_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Presenter $presenter): Response
    {
        $form = $this->createForm(PresenterType::class, $presenter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presenter_index');
        }

        return $this->render('presenter/edit.html.twig', [
            'presenter' => $presenter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="presenter_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Presenter $presenter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presenter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($presenter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('presenter_index');
    }
}
