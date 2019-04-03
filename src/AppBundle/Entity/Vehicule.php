<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule", indexes={@ORM\Index(name="fkEtat", columns={"fkEtat"})})
 * @ORM\Entity
 */
class Vehicule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVehicule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvehicule;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modele", type="string", length=50, nullable=true)
     */
    private $modele;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kilometrage", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $kilometrage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=true)
     */
    private $marque;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlace", type="integer", nullable=false)
     */
    private $nbplace;

    /**
     * @var string|null
     *
     * @ORM\Column(name="immatriculation", type="string", length=12, nullable=true)
     */
    private $immatriculation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datePremiereCirculation", type="date", nullable=true)
     */
    private $datepremierecirculation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkEtat", type="integer", nullable=true)
     */
    private $fketat;

    public function getIdvehicule(): ?int
    {
        return $this->idvehicule;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    public function setKilometrage($kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getNbplace(): ?int
    {
        return $this->nbplace;
    }

    public function setNbplace(int $nbplace): self
    {
        $this->nbplace = $nbplace;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(?string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getDatepremierecirculation(): ?\DateTimeInterface
    {
        return $this->datepremierecirculation;
    }

    public function setDatepremierecirculation(?\DateTimeInterface $datepremierecirculation): self
    {
        $this->datepremierecirculation = $datepremierecirculation;

        return $this;
    }

    public function getFketat(): ?int
    {
        return $this->fketat;
    }

    public function setFketat(?int $fketat): self
    {
        $this->fketat = $fketat;

        return $this;
    }


}
