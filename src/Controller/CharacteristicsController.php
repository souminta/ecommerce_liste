<?php

namespace App\Controller;

use App\Entity\Characteristics;
use App\Form\CharacteristicsType;
use App\Repository\CharacteristicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/characteristics")
 */
class CharacteristicsController extends AbstractController
{
    /**
     * @Route("/", name="characteristics_index", methods={"GET"})
     */
    public function index(CharacteristicsRepository $characteristicsRepository): Response
    {
        return $this->render('characteristics/index.html.twig', [
            'characteristics' => $characteristicsRepository->findAll(),
               
        ]);
    }

    /**
     * @Route("/new", name="characteristics_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $characteristic = new Characteristics();
        $form = $this->createForm(CharacteristicsType::class, $characteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
           
            $entityManager->persist($characteristic);
            $entityManager->flush();

            return $this->redirectToRoute('characteristics_index');
        }

        return $this->render('characteristics/new.html.twig', [
            'characteristic' => $characteristic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="characteristics_show", methods={"GET"})
     */
    public function show(Characteristics $characteristic): Response
    {
        return $this->render('characteristics/show.html.twig', [
            'characteristic' => $characteristic,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="characteristics_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Characteristics $characteristic): Response
    {
        $form = $this->createForm(CharacteristicsType::class, $characteristic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('characteristics_index');
        }

        return $this->render('characteristics/edit.html.twig', [
            'characteristic' => $characteristic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="characteristics_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Characteristics $characteristic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$characteristic->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($characteristic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('characteristics_index');
    }
}
