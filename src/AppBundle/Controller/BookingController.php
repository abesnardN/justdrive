<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Booking controller.
 *
 * @Route("booking")
 */
class BookingController extends Controller
{
    /**
     * Lists all booking entities.
     *
     * @Route("/", name="booking_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookings = $em->getRepository('AppBundle:Trajet')->findAll();

        return $this->render('@App/booking/index.html.twig', array(
            'bookings' => $bookings,
        ));
    }

    /**
     * Finds and displays a booking entity.
     *
     * @Route("/show/{id}", name="booking_show")
     * @Method("GET")
     */
    public function showAction(Trajet $booking)
    {

        return $this->render('@App/booking/show.html.twig', array(
            'booking' => $booking,
        ));
    }
	
	/**
     * @Route("/calendar", name="booking_calendar", methods={"GET"})
     */
    public function calendar(): Response
    {
        return $this->render('@App/booking/calendar.html.twig');
    }

}
