<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use AppBundle\Form\TrajetType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Route("/trajet")
 */
class TrajetController extends Controller
{
    /**
     * @Route("/", name="trajet_index", methods={"GET"})
     */
    public function index(): Response
    {
        $trajets = $this->getDoctrine()
            ->getRepository(Trajet::class)
            ->findAll();

        return $this->render('trajet/index.html.twig', [
            'trajets' => $trajets,
        ]);
    }
    /**
     * @Route("/search", name="trajet_search", methods={"GET"})
     */
    public function search(Request $request): Response
    {
$demandes = [];

      //si une recherche a été lancée
      if (null !== ($request->query->get('date'))) {
        //TODO
        //on recupere les trajets correspondants et non plein
        $demandes = $this->getDoctrine()
            ->getRepository(Trajet::class)
            ->search($request->query->get('date'),
                      $request->query->get('adressedepart'),
                      $request->query->get('adressearrive'));


      }

        return $this->render('@App\trajet/search.html.twig',['demandes'=>$demandes]);
    }

    /**
     * @Route("/new", name="trajet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {


        $trajet = new Trajet();
        $form = $this->createForm(TrajetType::class, $trajet, ['action' => $this->generateUrl('trajet_new')]);


        $form->handleRequest($request);

        // var_dump($form->isSubmitted());
        // var_dump($form->isValid());
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $trajet->setFkuser($this->get('security.token_storage')->getToken()->getUser());

$trajet->setPointrdvarrive(null);
$trajet->setPointrdvdepart(null);
$userConnected = $this->get('security.token_storage')->getToken()->getUser();

$trajet->setOccupant(new ArrayCollection([$userConnected]));




            $entityManager->persist($trajet);
            $entityManager->flush();
            return $this->redirectToRoute('demande_index');
        }

        return $this->render('@App\trajet/new.html.twig', [
            'trajet' => $trajet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inscrire", name="trajet_inscrire", methods={"GET","POST"})
     */
    public function inscrire(Request $request): Response
    {
      $idTrajet = $request->request->get('idTrajet');

      $userConnected = $this->get('security.token_storage')->getToken()->getUser();
      $trajet = $this->getDoctrine()
          ->getRepository(Trajet::class)
          ->find($idTrajet);

      $arrayOcc = $trajet->getOccupant()->toArray();
      //add
      $arrayOcc[] = $userConnected;
      $trajet->setOccupant(new ArrayCollection($arrayOcc));

            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($trajet);
            $entityManager->flush();
            return new Response();
    }

    /**
     * @Route("/{idtrajet}", name="trajet_show", methods={"GET"})
     */
    public function show(Trajet $trajet): Response
    {
        return $this->render('trajet/show.html.twig', [
            'trajet' => $trajet,
        ]);
    }

    /**
     * @Route("/{idtrajet}/edit", name="trajet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trajet $trajet): Response
    {
        $form = $this->createForm(TrajetType::class, $trajet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trajet_index', [
                'idtrajet' => $trajet->getIdtrajet(),
            ]);
        }

        return $this->render('trajet/edit.html.twig', [
            'trajet' => $trajet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idtrajet}", name="trajet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trajet $trajet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trajet->getIdtrajet(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trajet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trajet_index');
    }

    /**
     * @Route("/valideDemande/{id}", name="trajet_valid")
     */
    public function valid($id)
    {
      //recupere le trajet
      $trajet = $this->getDoctrine()
          ->getRepository(Trajet::class)
          ->find($id);
      //valide le trajet
      $trajet->setEtatTrajet('valide');

      //enregistre
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($trajet);
      $entityManager->flush();
      return new Response();



    }
    /**
     * @Route("/refuseDemande/{id}", name="trajet_refuse")
     */
    public function refuse($id)
    {
      //recupere le trajet
      $trajet = $this->getDoctrine()
          ->getRepository(Trajet::class)
          ->find($id);
      //refuse le trajet
      $trajet->setEtatTrajet('refuse');

      //enregistre
      $entityManager = $this->getDoctrine()->getManager();
      $entityManager->persist($trajet);
      $entityManager->flush();
      return new Response();



    }
}
