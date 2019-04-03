<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etatvehicule;
use AppBundle\Form\EtatvehiculeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/etatvehicule")
 */
class EtatvehiculeController extends Controller
{
    /**
     * @Route("/", name="etatvehicule_index", methods={"GET"})
     */
    public function index(): Response
    {
        $etatvehicules = $this->getDoctrine()
            ->getRepository(Etatvehicule::class)
            ->findAll();

        return $this->render('etatvehicule/index.html.twig', [
            'etatvehicules' => $etatvehicules,
        ]);
    }

    /**
     * @Route("/new", name="etatvehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $etatvehicule = new Etatvehicule();
        $form = $this->createForm(EtatvehiculeType::class, $etatvehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etatvehicule);
            $entityManager->flush();

            return $this->redirectToRoute('etatvehicule_index');
        }

        return $this->render('etatvehicule/new.html.twig', [
            'etatvehicule' => $etatvehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idetat}", name="etatvehicule_show", methods={"GET"})
     */
    public function show(Etatvehicule $etatvehicule): Response
    {
        return $this->render('etatvehicule/show.html.twig', [
            'etatvehicule' => $etatvehicule,
        ]);
    }

    /**
     * @Route("/{idetat}/edit", name="etatvehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Etatvehicule $etatvehicule): Response
    {
        $form = $this->createForm(EtatvehiculeType::class, $etatvehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etatvehicule_index', [
                'idetat' => $etatvehicule->getIdetat(),
            ]);
        }

        return $this->render('etatvehicule/edit.html.twig', [
            'etatvehicule' => $etatvehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idetat}", name="etatvehicule_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Etatvehicule $etatvehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatvehicule->getIdetat(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($etatvehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('etatvehicule_index');
    }
}
