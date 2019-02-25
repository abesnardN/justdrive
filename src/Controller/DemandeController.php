<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DemandeController extends AbstractController
{
    /**
     * @Route("/mesDemandes", name="homepage")
     */
    public function list()
    {

      // PHP 7+ code
     $une = new class{
    public $date = '15/12/2018 9:00';
    public $depart = 'Nantes';
    public $arrive = 'Rennes';
    public $vehicule = 'Renauld';

  };


      $demandes = [$une,$une];
        return $this->render('mesDemandes.html.twig', [
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
