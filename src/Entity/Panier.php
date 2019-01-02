<?php
// Entity/Panier.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 **/
class Panier
{
    
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @var int
     **/
    private $user_id;
    /** 
     * @ORM\Id @ORM\Column(type="integer") 
     * @var int
     **/
    private $produit_id;
    /** 
     * @ORM\Column(type="integer") 
     * @var int
     **/
    protected $quantite;
    public function __construct($user_id, $produit_id)
    {
        $this->user_id = $user_id;
        $this->produit_id = $produit_id;
    }
    
    
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getProduitId()
    {
        return $this->produit_id;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }
}
