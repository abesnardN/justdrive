<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * @Route("/mesDemandes")
 */
class DemandeController extends AbstractController
{
    /**
     * @Route("/", name="demande_index", methods={"GET"})
     */
    public function list()
    {
      $idUser = $this->get('security.token_storage')->getToken()->getUser()->getIduser();
          $demandes = $this->getDoctrine()
              ->getRepository(Trajet::class)
              ->findMyDemande($idUser);

        return $this->render('@App\mesDemandes.html.twig', [
            'demandes' => $demandes,
        ]);


    }
}
