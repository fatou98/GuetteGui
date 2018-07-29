<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $client;
    
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Bete")
    * @ORM\JoinColumn(nullable=false)
    */
    private $bete;
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
     * Get the value of client
     */ 
    public function getClient()
    {
        return $this->client;
    }
    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
    /**
     * Get the value of bete
     */ 
    public function getBete()
    {
        return $this->bete;
    }
    /**
     * Set the value of bete
     *
     * @return  self
     */ 
    public function setBete($bete)
    {
        $this->bete = $bete;
        return $this;
    }
}