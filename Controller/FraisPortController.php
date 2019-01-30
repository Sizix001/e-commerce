<?php

namespace App\Controller;

use App\Entity\FraisPort;
use App\Form\FraisPortType;
use App\Repository\FraisPortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/frais/port")
 */
class FraisPortController extends AbstractController
{
    /**
     * @Route("/", name="frais_port_index", methods={"GET"})
     */
    public function index(FraisPortRepository $fraisPortRepository): Response
    {
        return $this->render('frais_port/index.html.twig', [
            'frais_ports' => $fraisPortRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="frais_port_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fraisPort = new FraisPort();
        $form = $this->createForm(FraisPortType::class, $fraisPort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fraisPort);
            $entityManager->flush();

            return $this->redirectToRoute('frais_port_index');
        }

        return $this->render('frais_port/new.html.twig', [
            'frais_port' => $fraisPort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frais_port_show", methods={"GET"})
     */
    public function show(FraisPort $fraisPort): Response
    {
        return $this->render('frais_port/show.html.twig', [
            'frais_port' => $fraisPort,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="frais_port_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FraisPort $fraisPort): Response
    {
        $form = $this->createForm(FraisPortType::class, $fraisPort);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('frais_port_index', [
                'id' => $fraisPort->getId(),
            ]);
        }

        return $this->render('frais_port/edit.html.twig', [
            'frais_port' => $fraisPort,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="frais_port_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FraisPort $fraisPort): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fraisPort->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fraisPort);
            $entityManager->flush();
        }

        return $this->redirectToRoute('frais_port_index');
    }
}
