<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning", indexes={@ORM\Index(name="fk_planning_vehicule", columns={"fkVehicule"})})
 * @ORM\Entity
 */
class Planning
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="planning", type="string", length=265, nullable=true)
     */
    private $planning;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkVehicule", type="integer", nullable=true)
     */
    private $fkvehicule;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer", nullable=false)
     */
    private $annee;

    public function getIdcle(): ?int
    {
        return $this->idcle;
    }

    public function getPlanning(): ?string
    {
        return $this->planning;
    }

    public function setPlanning(?string $planning): self
    {
        $this->planning = $planning;

        return $this;
    }

    public function getFkvehicule(): ?int
    {
        return $this->fkvehicule;
    }

    public function setFkvehicule(?int $fkvehicule): self
    {
        $this->fkvehicule = $fkvehicule;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }


}
