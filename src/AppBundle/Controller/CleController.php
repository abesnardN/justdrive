<?php

namespace App\Controller;

use App\Entity\Cle;
use App\Form\CleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cle")
 */
class CleController extends Controller
{
    /**
     * @Route("/", name="cle_index", methods={"GET"})
     */
    public function index(): Response
    {
        $cles = $this->getDoctrine()
            ->getRepository(Cle::class)
            ->findAll();

        return $this->render('cle/index.html.twig', [
            'cles' => $cles,
        ]);
    }

    /**
     * @Route("/new", name="cle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cle = new Cle();
        $form = $this->createForm(CleType::class, $cle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cle);
            $entityManager->flush();

            return $this->redirectToRoute('cle_index');
        }

        return $this->render('cle/new.html.twig', [
            'cle' => $cle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcle}", name="cle_show", methods={"GET"})
     */
    public function show(Cle $cle): Response
    {
        return $this->render('cle/show.html.twig', [
            'cle' => $cle,
        ]);
    }

    /**
     * @Route("/{idcle}/edit", name="cle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cle $cle): Response
    {
        $form = $this->createForm(CleType::class, $cle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cle_index', [
                'idcle' => $cle->getIdcle(),
            ]);
        }

        return $this->render('cle/edit.html.twig', [
            'cle' => $cle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idcle}", name="cle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cle $cle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cle->getIdcle(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cle_index');
    }
}
