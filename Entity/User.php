<?php

namespace StartPack\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Doctrine\ORM\Mapping as ORM;


/**
 * StartPack\CoreBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class User implements UserInterface
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
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=256, nullable=false)
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
     * @var UserInfo
     *
     * @ORM\OneToOne(targetEntity="UserInfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="user")
     * })
     */
    private $userInfo;

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
    
    /**
     * Set user
     *
     * @param StartPack\CoreBundle\Entity\UserInfo $user
     * @return UserInfo
     */
    public function setUserInfo(\StartPack\CoreBundle\Entity\UserInfo $userInfo = null)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * Get user
     *
     * @return StartPack\CoreBundle\Entity\UserInfo
     */
    public function getUserInfo()
    {
        return $this->userInfo;
    }
}