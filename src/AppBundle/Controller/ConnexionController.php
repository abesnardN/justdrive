<?php


namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\CleType;
use AppBundle\Form\ConnexionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/connexion")
 */
class ConnexionController extends Controller
{
    /**
     * @Route("/", name="adresse_index", methods={"GET"})
     */
    public function connectAction(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(ConnexionType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('@App/connexion.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}