<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cle
 *
 * @ORM\Table(name="cle", indexes={@ORM\Index(name="fk_cle_user", columns={"fkUser"}), @ORM\Index(name="fk_cle_site", columns={"fkSite"}), @ORM\Index(name="fk_cle_vehicule", columns={"fkVehicule"})})
 * @ORM\Entity
 */
class Cle
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
     * @var int|null
     *
     * @ORM\Column(name="fkSite", type="integer", nullable=true)
     */
    private $fksite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkUser", type="integer", nullable=true)
     */
    private $fkuser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fkVehicule", type="integer", nullable=true)
     */
    private $fkvehicule;

    public function getIdcle(): ?int
    {
        return $this->idcle;
    }

    public function getFksite(): ?int
    {
        return $this->fksite;
    }

    public function setFksite(?int $fksite): self
    {
        $this->fksite = $fksite;

        return $this;
    }

    public function getFkuser(): ?int
    {
        return $this->fkuser;
    }

    public function setFkuser(?int $fkuser): self
    {
        $this->fkuser = $fkuser;

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


}
