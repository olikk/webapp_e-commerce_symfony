<?php

// Entity/Produit.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\Table(name="produit")
 **/
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $nom;
    /** 
     * @ORM\Column(type="integer") 
     * @var int
     **/
    protected $prix;
    /** 
     * @ORM\Column(type="integer") 
     * @var int
     **/
    protected $vendu;
    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $description;
    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $image;
    public $quantity;
    
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    public function setVendu($vendu)
    {
        $this->vendu = $vendu;
    }
    public function getVendu()
    {
        return $this->vendu;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}
?>