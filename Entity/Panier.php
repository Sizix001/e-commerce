<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="panier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\Column(type="integer")
     */
    private $expedie;

    /**
     * @ORM\Column(type="integer")
     */
    private $en_cours_de_livraison;

    /**
     * @ORM\Column(type="integer")
     */
    private $livre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Articles
    {
        return $this->article;
    }

    public function setArticle(?Articles $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getExpedie(): ?int
    {
        return $this->expedie;
    }

    public function setExpedie(int $expedie): self
    {
        $this->expedie = $expedie;

        return $this;
    }

    public function getEnCoursDeLivraison(): ?int
    {
        return $this->en_cours_de_livraison;
    }

    public function setEnCoursDeLivraison(int $en_cours_de_livraison): self
    {
        $this->en_cours_de_livraison = $en_cours_de_livraison;

        return $this;
    }

    public function getLivre(): ?int
    {
        return $this->livre;
    }

    public function setLivre(int $livre): self
    {
        $this->livre = $livre;

        return $this;
    }
}
