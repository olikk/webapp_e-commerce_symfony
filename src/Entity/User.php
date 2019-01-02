<?php
// Entity/User.php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity @ORM\Table(name="utilisateur")
 **/
class User implements UserInterface, \Serializable
{
    /** 
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     * @var int
     **/
    protected $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    protected $nom;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $prenom;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $email;
    /**
     * @ORM\Column(type="string")
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
    public function getUsername() {
        return $this->email;
    }

    public function getSalt() {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
     /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): array
    {
        //$roles = $this->roles;
        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);
    }
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }
    /**
     * {@inheritdoc}
     */
    public function serialize(): string
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        return serialize([$this->id,$this->nom, $this->prenom, $this->email, $this->password]);
    }
    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized): void
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        [$this->id, $this->nom, $this->prenom, $this->email, $this->password] = unserialize($serialized, ['allowed_classes' => false]);
    }

}