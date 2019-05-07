<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trajet
 *
 * @ORM\Table(name="trajet", indexes={@ORM\Index(name="fk_trajet_rdvarrive", columns={"pointRDVArrive"}), @ORM\Index(name="fk_trajet_depart", columns={"adresseDepart"}), @ORM\Index(name="fk_trajet_vehicule", columns={"fkVehicule"}), @ORM\Index(name="fk_trajet_rdvdepart", columns={"pointRDVDepart"}), @ORM\Index(name="fk_trajet_etat", columns={"fkEtat"}), @ORM\Index(name="fk_trajet_conducteur", columns={"fkUser"}), @ORM\Index(name="fk_trajet_arrive", columns={"addresseArrive"})})
 * @ORM\Entity
 */
class Trajet
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTrajet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtrajet;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="trajets", cascade="persist")
     * @ORM\JoinColumn(name="fkUser", referencedColumnName="idUser")
     */
    private $fkuser;

    /**
     * @var int|null
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Adresse", cascade="persist")
     * @ORM\JoinColumn(name="adresseDepart", referencedColumnName="idAdresse")
     */
    private $adressedepart;

    /**
     * @var Adresse|null
     *
     * @ORM\Column(name="addresseArrive", type="integer", nullable=true)
     */
    private $addressearrive;

    /**
     * @var Adresse|null
     *
     * @ORM\Column(name="fkVehicule", type="integer", nullable=true)
     */
    private $fkvehicule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="datetime", nullable=false)
     */
    private $datedepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArrive", type="datetime", nullable=false)
     */
    private $datearrive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kilometrage", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $kilometrage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaireConducteur", type="string", length=150, nullable=true)
     */
    private $commentaireconducteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="commentaireInterne", type="string", length=150, nullable=true)
     */
    private $commentaireinterne;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointRDVDepart", type="integer", nullable=true)
     */
    private $pointrdvdepart;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointRDVArrive", type="integer", nullable=true)
     */
    private $pointrdvarrive;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkEtat", type="integer", nullable=true)
     */
    private $fketat;

    public function getIdtrajet(): ?int
    {
        return $this->idtrajet;
    }

    public function getFkuser(): ?User
    {
        return $this->fkuser;
    }

    public function setFkuser(?User $fkuser): self
    {
        $this->fkuser = $fkuser;

        return $this;
    }

    public function getAdressedepart(): ?Adresse
    {
        return $this->adressedepart;
    }

    public function setAdressedepart(?Adresse $adressedepart): self
    {
        $this->adressedepart = $adressedepart;

        return $this;
    }

    public function getAddressearrive(): ?Adresse
    {
        return $this->addressearrive;
    }

    public function setAddressearrive(?Adresse $addressearrive): self
    {
        $this->addressearrive = $addressearrive;

        return $this;
    }

    public function getFkvehicule(): ?Vehicule
    {
        return $this->fkvehicule;
    }

    public function setFkvehicule(?Vehicule $fkvehicule): self
    {
        $this->fkvehicule = $fkvehicule;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): self
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDatearrive(): ?\DateTimeInterface
    {
        return $this->datearrive;
    }

    public function setDatearrive(\DateTimeInterface $datearrive): self
    {
        $this->datearrive = $datearrive;

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

    public function getCommentaireconducteur(): ?string
    {
        return $this->commentaireconducteur;
    }

    public function setCommentaireconducteur(?string $commentaireconducteur): self
    {
        $this->commentaireconducteur = $commentaireconducteur;

        return $this;
    }

    public function getCommentaireinterne(): ?string
    {
        return $this->commentaireinterne;
    }

    public function setCommentaireinterne(?string $commentaireinterne): self
    {
        $this->commentaireinterne = $commentaireinterne;

        return $this;
    }

    public function getPointrdvdepart(): ?Adresse
    {
        return $this->pointrdvdepart;
    }

    public function setPointrdvdepart(?Adresse $pointrdvdepart): self
    {
        $this->pointrdvdepart = $pointrdvdepart;

        return $this;
    }

    public function getPointrdvarrive(): ?Adresse
    {
        return $this->pointrdvarrive;
    }

    public function setPointrdvarrive(?Adresse $pointrdvarrive): self
    {
        $this->pointrdvarrive = $pointrdvarrive;

        return $this;
    }

    public function getFketat(): ?Etatvehicule
    {
        return $this->fketat;
    }

    public function setFketat(?Etatvehicule $fketat): self
    {
        $this->fketat = $fketat;

        return $this;
    }


}
