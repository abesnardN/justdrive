<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenom", type="string", length=50, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="permis", type="datetime", nullable=true)
     */
    private $permis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlPermis", type="string", length=50, nullable=true)
     */
    private $urlpermis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime", nullable=false)
     */
    private $dateinscription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=true)
     */
    private $mail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numTel", type="string", length=13, nullable=true)
     */
    private $numtel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=32, nullable=true)
     */
    private $password;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Trajet", mappedBy="fkuser")
     */
    private $trajets;
    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Trajet", mappedBy="occupant")
    */
    private $trajetOccupant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="admin", type="smallint", length=4, nullable=true, )
     */
    private $admin = 0;

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPermis(): ?\DateTimeInterface
    {
        return $this->permis;
    }

    public function setPermis(?\DateTimeInterface $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    public function getUrlpermis(): ?string
    {
        return $this->urlpermis;
    }

    public function setUrlpermis(?string $urlpermis): self
    {
        $this->urlpermis = $urlpermis;

        return $this;
    }

    public function getDateinscription(): ?\DateTimeInterface
    {
        return $this->dateinscription;
    }

    public function setDateinscription(\DateTimeInterface $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(?string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getAdmin(): ?string
    {
        return $this->admin;
    }

    /**
     * @param integer|null $admin
     */
    public function setAdmin(?int $admin): void
    {
        $this->admin = $admin;
    }

    /**
     * @return mixed
     */
    public function getTrajets()
    {
        return $this->trajets;
    }

    /**
     * @param mixed $trajets
     */
    public function setTrajets($trajets): void
    {
        $this->trajets = $trajets;
    }



    public function getRoles()
    {
        $role = array('ROLE_USER');
        if($this->getAdmin() == 1) {
            $role = array('ROLE_ADMIN');
        }
        return $role;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        return '';
    }

    public function getUsername()
    {
        return $this->getMail();
    }
}
