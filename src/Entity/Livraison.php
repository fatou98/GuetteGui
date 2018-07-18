<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 */
class Livraison
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Commande")
    * @ORM\JoinColumn(nullable=false)
    */
    private $commande;
    /**
     * @ORM\Column(type="date")
     */
    private $date;
    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;
    public function getId()
    {
        return $this->id;
    }
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }
    public function getEtat(): ?bool
    {
        return $this->etat;
    }
    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;
        return $this;
    }
    /**
     * Get the value of commande
     */ 
    public function getCommande()
    {
        return $this->commande;
    }
    /**
     * Set the value of commande
     *
     * @return  self
     */ 
    public function setCommande($commande)
    {
        $this->commande = $commande;
        return $this;
    }
}