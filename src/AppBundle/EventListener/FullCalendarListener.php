<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Booking;
use AppBundle\Entity\Trajet;
use AppBundle\Repository\BookingRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;

class FullCalendarListener
{
    private $bookingRepository;
    private $router;

    public function __construct(
        BookingRepository $bookingRepository,
        UrlGeneratorInterface $router
    ) {
        $this->bookingRepository = $bookingRepository;
        $this->router = $router;
    }

    public function loadEvents(CalendarEvent $calendar): void
    {
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();

        // Modify the query to fit to your entity and needs
        // Change b.beginAt by your start date in your custom entity
        $bookings = $this->bookingRepository
            ->createQueryBuilder('trajet')
            ->where('trajet.datedepart BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
            ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
            ->getQuery()
            ->getResult()
        ;

        foreach ($bookings as $booking) {
            // this create the events with your own entity (here booking entity) to populate calendar
            $bookingEvent = new Event(
                $booking->getFkuser()->getPrenom().' '.$booking->getFkuser()->getNom().' '.$booking->getFkvehicule()->getImmatriculation(),
                $booking->getDatedepart(),
                $booking->getDatearrive() // If the end date is null or not defined, a all day event is created.
            );

            /*
             * Optional calendar event settings
             *
             * For more information see : Toiba\FullCalendarBundle\Entity\Event
             * and : https://fullcalendar.io/docs/event-object
             */
            // $bookingEvent->setUrl('http://www.google.com');

           // /** @var Trajet $booking */
            if($booking->getEtatTrajet() == 'valide'){

                $bookingEvent->setBackgroundColor('green');
                $bookingEvent->setCustomField('borderColor', 'green');

            }elseif ($booking->getEtatTrajet() == 'refuse'){
                $bookingEvent->setBackgroundColor('red');
                $bookingEvent->setCustomField('borderColor', 'red');
            }else{
                $bookingEvent->setBackgroundColor('orange');
                $bookingEvent->setCustomField('borderColor', 'orange');
            }



            $bookingEvent->setUrl(
                $this->router->generate('booking_show', [
                    'id' => $booking->getIdtrajet(),
                ])
            );

            // finally, add the booking to the CalendarEvent for displaying on the calendar
            $calendar->addEvent($bookingEvent);
        }
    }
}
