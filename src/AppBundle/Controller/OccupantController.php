<?php

namespace App\Controller;

use App\Entity\Occupant;
use App\Form\OccupantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/occupant")
 */
class OccupantController extends Controller
{
    /**
     * @Route("/", name="occupant_index", methods={"GET"})
     */
    public function index(): Response
    {
        $occupants = $this->getDoctrine()
            ->getRepository(Occupant::class)
            ->findAll();

        return $this->render('occupant/index.html.twig', [
            'occupants' => $occupants,
        ]);
    }

    /**
     * @Route("/new", name="occupant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $occupant = new Occupant();
        $form = $this->createForm(OccupantType::class, $occupant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($occupant);
            $entityManager->flush();

            return $this->redirectToRoute('occupant_index');
        }

        return $this->render('occupant/new.html.twig', [
            'occupant' => $occupant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{fktrajet}", name="occupant_show", methods={"GET"})
     */
    public function show(Occupant $occupant): Response
    {
        return $this->render('occupant/show.html.twig', [
            'occupant' => $occupant,
        ]);
    }

    /**
     * @Route("/{fktrajet}/edit", name="occupant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Occupant $occupant): Response
    {
        $form = $this->createForm(OccupantType::class, $occupant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('occupant_index', [
                'fktrajet' => $occupant->getFktrajet(),
            ]);
        }

        return $this->render('occupant/edit.html.twig', [
            'occupant' => $occupant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{fktrajet}", name="occupant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Occupant $occupant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$occupant->getFktrajet(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($occupant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('occupant_index');
    }
}
