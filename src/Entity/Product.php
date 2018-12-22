<?php
namespace App\Entity;
// Entity/Produit.php
/**
 * @Entity @Table(name="produit")
 **/
class Product
{
    /** 
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     **/
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $nom;
    /** 
     * @Column(type="integer") 
     * @var int
     **/
    protected $prix;
    /** 
     * @Column(type="integer") 
     * @var int
     **/
    protected $vendu;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $description;
    /**
     * @Column(type="string")
     * @var string
     **/
    protected $image;
    
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