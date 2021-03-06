<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatvehicule
 *
 * @ORM\Table(name="etatvehicule")
 * @ORM\Entity
 */
class Etatvehicule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEtat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idetat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trajet", mappedBy="fketat")
     */
    private $trajets;


    public function getIdetat(): ?int
    {
        return $this->idetat;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }


}
