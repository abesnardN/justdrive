<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/connexion")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/", name="connexion")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        if($this->isGranted('ROLE_USER') == true) {
            return $this->redirectToRoute('demande_index');
        } else if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('booking_calendar');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('@App/user/connexion.html.twig', [
            'error'         => $error
        ]);
    }
}
