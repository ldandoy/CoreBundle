<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPack\CoreBundle\Entity\UserInfo
 *
 * @ORM\Table(name="user_info")
 * @ORM\Entity
 */
class UserInfo
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
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=250, nullable=false)
     */
    private $lastName;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="first_name", type="string", length=250, nullable=false)
     */
    private $firstName;

    /**
     * @var string $address
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=false)
     */
    private $address;

    /**
     * @var string $cp
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=false)
     */
    private $cp;

    /**
     * @var string $ville
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var boolean $optin
     *
     * @ORM\Column(name="optin", type="boolean", nullable=false)
     */
    private $optin;
    
    
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
     * Set lastName
     *
     * @param string $lastName
     * @return UserInfo
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return UserInfo
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return UserInfo
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return UserInfo
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return UserInfo
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set optin
     *
     * @param boolean $optin
     * @return UserInfo
     */
    public function setOptin($optin)
    {
        $this->optin = $optin;
    
        return $this;
    }

    /**
     * Get optin
     *
     * @return boolean 
     */
    public function getOptin()
    {
        return $this->optin;
    }

    /**
     * Set user
     *
     * @param StartPack\CoreBundle\Entity\User $user
     * @return UserInfo
     */
    public function setUser(\StartPack\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return StartPack\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}