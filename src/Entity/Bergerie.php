<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\BergerieRepository")
 */
class Bergerie
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
    private $berger;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;
    public function getId()
    {
        return $this->id;
    }
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }
    /**
     * Get the value of berger
     */ 
    public function getBerger()
    {
        return $this->berger;
    }
    /**
     * Set the value of berger
     *
     * @return  self
     */ 
    public function setBerger($berger)
    {
        $this->berger = $berger;
        return $this;
    }
}