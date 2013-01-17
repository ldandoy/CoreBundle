<?php

namespace StartPack\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * StartPack\CoreBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @UniqueEntity("email")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
	 * @Assert\NotBlank(message="Vous devez entrer un email.")
	 * @Assert\MaxLength(limit=100, message="Votre email doit avoir moins de {{ limit }} caractères.")
	 * @Assert\Email(message="Votre email n'est pas valide.")
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=256, nullable=false)
	 * @Assert\NotBlank(message="Vous devez entrer un mot de passe.")
	 * @Assert\NotNull(message="Vous devez entrer un mot de passe.")
	 * @Assert\MinLength(limit=6, message="Votre mot de passe doit avoir plus de {{ limit }} caractères.")
	 * @Assert\MaxLength(limit=16, message="Votre mot de passe doit avoir moins de {{ limit }} caractères.")
     */
    private $password;

    /**
     * @var string $role
     *
     * @ORM\Column(name="role", type="string", length=128, nullable=false)
     */
    private $role;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=64, nullable=false)
     */
    private $salt;

    /**
     * @var integer $createdAt
     *
     * @ORM\Column(name="created_at", type="integer", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer $updatedAt
     *
     * @ORM\Column(name="updated_at", type="integer", nullable=false)
     */
    private $updatedAt;
	
    /**
     * @ORM\OneToOne(targetEntity="UserInfo", mappedBy="user", cascade={"persist", "remove"})
     */
	private $userInfo;

    private $plainPassword;
    
    public function __construct(){
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
        
    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }
	
	/**
	 * @param StartPack\CoreBundle\Entity\UserInfo $userInfo
	 */
	public function setUserInfo($userInfo)
	{
		$this->userInfo = $userInfo;
	}
	 
	/**
	* @return StartPack\CoreBundle\Entity\UserInfo
	*/
	public function getUserInfo()
	{
		return $this->userInfo;
	}

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return integer 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param integer $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return integer 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set plainPassword
     *
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * Get plainPassword
     *
     * @return string 
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function updatePassword(){
        if( 0 !== strlen( $password = $this->getPlainPassword() )){
            if( empty($this->salt) ){
                $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
            }
            $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
            $password = $encoder->encodePassword($password, $this->getSalt());
            $this->setPassword($password);
        }
    }

    /**
     * get user roles
     */
    public function getRoles(){
        return array($this->getRole());
    }

    public function getUsername(){
        return $this->email;
    }

    public function eraseCredentials(){

    }

    public function equals(UserInterface $user){
        return $this->getId() == $user->getId();
    }

    /**
     * @ORM\PrePersist
     */
    public function onCreate()
    {
       $this->updatePassword(); 
       $this->setUpdatedAt(time());
       $this->setCreatedAt(time());
    }

    /**
     * @ORM\PreUpdate
     */
    public function onUpdate()
    {
       $this->updatePassword(); 
       $this->setUpdatedAt(time());
    }

    /**
     * Serializes the user.
     *
     * The serialized data have to contain the fields used by the equals method and the username.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->password,
            $this->salt,
            $this->email,
        ));
    }

    /**
     * Unserializes the user.
     *
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->password,
            $this->salt,
            $this->email,
        ) = unserialize($serialized);
    }
}