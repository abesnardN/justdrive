<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DemandeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
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
}
