<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Trajet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TicketRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trajet::class);
    }

    public function search($date, $depart, $arriver){

      return  $this->createQueryBuilder('t')
                      ->innerJoin('t.adressedepart','depart')
                      ->innerJoin('t.adressearrive','arrive')
                      ->where("t.datedepart = :date")
                      ->andWhere("depart.ville = :depart")
                      ->andWhere("arrive.ville = :arrive")
                      ->andWhere("t.etatTrajet = 'valide'")
                      ->setParameter('date', $date)
                      ->setParameter('depart', $depart)
                       ->setParameter('arrive', $arriver)
                      ->getQuery()
                      ->getResult();
    }
    public function findMyDemande($idUser){
      $date=new \DateTime('now');

      return  $this->createQueryBuilder('t')
                      ->innerJoin('t.occupant','occupant')
                      ->where("t.datedepart > :date")
                      ->orWhere("occupant = :occ")
                      ->setParameter('date', $date)
                      ->setParameter('occ', $idUser)
                      ->getQuery()
                      ->getResult();
    }
}
