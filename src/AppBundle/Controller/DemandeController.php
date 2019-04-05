<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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
      $demandes = $this->getDoctrine()
          ->getRepository(Trajet::class)
          ->findAll();
// dump($demandes);
// die();
      // PHP 7+ code
     $une = new class{
    public $date = '15/12/2018 9:00';
    public $depart = 'Nantes';
    public $arrive = 'Rennes';
    public $vehicule = 'Renauld';

  };


      $demandes = [$une,$une];
        return $this->render('@App\mesDemandes.html.twig', [
            'demandes' => $demandes,
        ]);


    }


/**
 * @Route("/valideDemande/{id}", name="homepage")
 */
public function valid($id)
{
  // PHP 7+ code
 $une = new class{
public $date = '15/12/2018 9:00';
public $depart = 'Nantes';
public $arrive = 'Rennes';
public $vehicule = 'Renauld';
public $conducteur = 'M. TRUC';
public $commentaireInterne = 'M. TRUC';
public $commentaireConducteurInterne = 'j\'ai besoin de place pour mon materiel';
public $covoitureur = ['Mme TRUC','M. DUPOND'];

};


  $demandes = [$une,$une];
    return $this->render('valideDemande.html.twig', [
        'demandes' => $une,
        'id'=>$id
    ]);
}
}
