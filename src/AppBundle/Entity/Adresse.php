<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse", indexes={@ORM\Index(name="fkPays", columns={"fkPays"})})
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var int
     *
     * @ORM\Column(name="idadresse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numRue", type="string", length=4, nullable=true)
     */
    private $numrue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomRue", type="string", length=50, nullable=true)
     */
    private $nomrue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codePostal", type="string", length=5, nullable=true)
     */
    private $codepostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fkPays", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $fkpays;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trajet", mappedBy="adressearrive")
     */
    private $trajetsD;
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trajet", mappedBy="adressedepart")
     */
    private $trajetsA;

    public function getIdadresse(): ?int
    {
        return $this->idadresse;
    }

    public function getNumrue(): ?string
    {
        return $this->numrue;
    }

    public function setNumrue(?string $numrue): self
    {
        $this->numrue = $numrue;

        return $this;
    }

    public function getNomrue(): ?string
    {
        return $this->nomrue;
    }

    public function setNomrue(?string $nomrue): self
    {
        $this->nomrue = $nomrue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(?string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getFkpays(): ?string
    {
        return $this->fkpays;
    }

    public function setFkpays(?string $fkpays): self
    {
        $this->fkpays = $fkpays;

        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }


}
