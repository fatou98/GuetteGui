<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\BeteRepository")
 */
class Bete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nomcomplet;
    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $age;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;
    /**
     * @ORM\Column(type="integer")
     */
    private $prix;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $gabari;
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $taille;
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $poids;
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Bergerie")
    * @ORM\JoinColumn(nullable=false)
    */
    private $bergerie;
    
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Race")
    * @ORM\JoinColumn(nullable=false)
    */
    private $race;
    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;
    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Image",mappedBy="bete" )
    * @ORM\JoinColumn(nullable=false)
    */
    private $images;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    public function getId()
    {
        return $this->id;
    }
    public function getNomcomplet(): ?string
    {
        return $this->nomcomplet;
    }
    public function setNomcomplet(string $nomcomplet): self
    {
        $this->nomcomplet = $nomcomplet;
        return $this;
    }
    public function getAge(): ?string
    {
        return $this->age;
    }
    public function setAge(?string $age): self
    {
        $this->age = $age;
        return $this;
    }
    public function getCouleur(): ?string
    {
        return $this->couleur;
    }
    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
    }
    public function getPrix(): ?int
    {
        return $this->prix;
    }
    public function setPrix(int $prix): self
    {
        $this->prix = $prix;
        return $this;
    }
    public function getGabari(): ?string
    {
        return $this->gabari;
    }
    public function setGabari(?string $gabari): self
    {
        $this->gabari = $gabari;
        return $this;
    }
    public function getTaille(): ?string
    {
        return $this->taille;
    }
    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;
        return $this;
    }
    public function getPoids(): ?string
    {
        return $this->poids;
    }
    public function setPoids(?string $poids): self
    {
        $this->poids = $poids;
        return $this;
    }
    public function getEtat(): ?boolean
    {
        return $this->etat;
    }
    public function setEtat($etat): self
    {
        $this->etat = $etat;
        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Get the value of bergerie
     */ 
    public function getBergerie()
    {
        return $this->bergerie;
    }
    /**
     * Set the value of bergerie
     *
     * @return  self
     */ 
    public function setBergerie($bergerie)
    {
        $this->bergerie = $bergerie;
        return $this;
    }
    /**
     * Get the value of race
     */ 
    public function getRace()
    {
        return $this->race;
    }
    /**
     * Set the value of race
     *
     * @return  self
     */ 
    public function setRace($race)
    {
        $this->race = $race;
        return $this;
    }
    /**
     * Get the value of images
     */ 
    public function getImages()
    {
        return $this->images;
    }
    /**
     * Set the value of images
     *
     * @return  self
     */ 
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }
}