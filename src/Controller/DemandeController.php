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


        return $this->render('mesDemandes.html.twig', [
            'posts' => 'io',
        ]);
    }
}
