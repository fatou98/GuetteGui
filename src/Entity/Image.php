<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="blob")
     */
    private $image;
 /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Bete",inversedBy="images")
    * @ORM\JoinColumn(nullable=false)
    */
    private $bete;
    
    public function getId()
    {
        return $this->id;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image): self
    {
        $this->image = $image;
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
    /**
     * 
     */
    public  function __toString() 
    { 
      return  $this->$image;
    } 
}