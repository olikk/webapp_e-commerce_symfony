<?php
// Entity/User.php
namespace App\Entity;
/**
 * @Entity @Table(name="utilisateur")
 **/
class User
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
     * @Column(type="string")
     * @var string
     */
    protected $prenom;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $password;
 
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
    
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}