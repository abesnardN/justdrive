<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 *
 * @ORM\Table(name="site")
 * @ORM\Entity
 */
class Site
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="addresse", type="integer", nullable=true)
     */
    private $addresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="label", type="string", length=150, nullable=true)
     */
    private $label;

    public function getIdsite(): ?int
    {
        return $this->idsite;
    }

    public function getAddresse(): ?int
    {
        return $this->addresse;
    }

    public function setAddresse(?int $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;

        return $this;
    }


}
