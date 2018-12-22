<?php
// Entity/Panier.php
/**
 * @Entity @Table(name="panier")
 **/
class Panier
{
    /** 
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     **/
    protected $id;
    /**
     * @Column(type="integer")
     * @var int
     **/
    protected $user_id;
    /** 
     * @Column(type="integer") 
     * @var int
     **/
    protected $produit_id;
    /** 
     * @Column(type="integer") 
     * @var int
     **/
    protected $quantite;
    
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($userId)
    {
        $this->user_id = $userId;
    }
    public function getProduitId()
    {
        return $this->produit_id;
    }

    public function setProduitId($produitId)
    {
        $this->produit_id = $produitId;
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
