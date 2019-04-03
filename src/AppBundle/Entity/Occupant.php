<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Occupant
 *
 * @ORM\Table(name="occupant", indexes={@ORM\Index(name="fk_occupant_rdvarrive", columns={"fkUser"}), @ORM\Index(name="fk_accupant_etat", columns={"fkEtat"})})
 * @ORM\Entity
 */
class Occupant
{
    /**
     * @var int
     *
     * @ORM\Column(name="fkTrajet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fktrajet;

    /**
     * @var int
     *
     * @ORM\Column(name="fkUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fkuser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkEtat", type="integer", nullable=true)
     */
    private $fketat;

    public function getFktrajet(): ?int
    {
        return $this->fktrajet;
    }

    public function getFkuser(): ?int
    {
        return $this->fkuser;
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
