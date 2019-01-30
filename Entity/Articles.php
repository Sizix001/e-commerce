<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\FraisPort", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $frais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="blob")
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Panier", mappedBy="article")
     */
    private $panier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Changed", mappedBy="articles")
     */
    private $changeds;

    public function __construct()
    {
        $this->panier = new ArrayCollection();
        $this->changeds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCat(): ?Categories
    {
        return $this->cat;
    }

    public function setCat(?Categories $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    public function getFrais(): ?FraisPort
    {
        return $this->frais;
    }

    public function setFrais(?FraisPort $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|Panier[]
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): self
    {
        if (!$this->panier->contains($panier)) {
            $this->panier[] = $panier;
            $panier->setArticle($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->panier->contains($panier)) {
            $this->panier->removeElement($panier);
            // set the owning side to null (unless already changed)
            if ($panier->getArticle() === $this) {
                $panier->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Changed[]
     */
    public function getChangeds(): Collection
    {
        return $this->changeds;
    }

    public function addChanged(Changed $changed): self
    {
        if (!$this->changeds->contains($changed)) {
            $this->changeds[] = $changed;
            $changed->setArticles($this);
        }

        return $this;
    }

    public function removeChanged(Changed $changed): self
    {
        if ($this->changeds->contains($changed)) {
            $this->changeds->removeElement($changed);
            // set the owning side to null (unless already changed)
            if ($changed->getArticles() === $this) {
                $changed->setArticles(null);
            }
        }

        return $this;
    }
}
