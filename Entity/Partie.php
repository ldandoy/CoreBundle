<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie
 *
 * @ORM\Table(name="partie")
 * @ORM\Entity
 */
class Partie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="typePartie", type="string", length=20, nullable=false)
     */
    private $typepartie;

    /**
     * @var string
     *
     * @ORM\Column(name="tailleGoban", type="string", length=20, nullable=false)
     */
    private $taillegoban;

    /**
     * @var integer
     *
     * @ORM\Column(name="joueurNoir", type="integer", nullable=false)
     */
    private $joueurnoir;

    /**
     * @var integer
     *
     * @ORM\Column(name="joueurBlanc", type="integer", nullable=false)
     */
    private $joueurblanc;

    /**
     * @var string
     *
     * @ORM\Column(name="statutPartie", type="string", length=20, nullable=false)
     */
    private $statutpartie;



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
     * Set typepartie
     *
     * @param string $typepartie
     * @return Partie
     */
    public function setTypepartie($typepartie)
    {
        $this->typepartie = $typepartie;
    
        return $this;
    }

    /**
     * Get typepartie
     *
     * @return string 
     */
    public function getTypepartie()
    {
        return $this->typepartie;
    }

    /**
     * Set taillegoban
     *
     * @param string $taillegoban
     * @return Partie
     */
    public function setTaillegoban($taillegoban)
    {
        $this->taillegoban = $taillegoban;
    
        return $this;
    }

    /**
     * Get taillegoban
     *
     * @return string 
     */
    public function getTaillegoban()
    {
        return $this->taillegoban;
    }

    /**
     * Set joueurnoir
     *
     * @param integer $joueurnoir
     * @return Partie
     */
    public function setJoueurnoir($joueurnoir)
    {
        $this->joueurnoir = $joueurnoir;
    
        return $this;
    }

    /**
     * Get joueurnoir
     *
     * @return integer 
     */
    public function getJoueurnoir()
    {
        return $this->joueurnoir;
    }

    /**
     * Set joueurblanc
     *
     * @param integer $joueurblanc
     * @return Partie
     */
    public function setJoueurblanc($joueurblanc)
    {
        $this->joueurblanc = $joueurblanc;
    
        return $this;
    }

    /**
     * Get joueurblanc
     *
     * @return integer 
     */
    public function getJoueurblanc()
    {
        return $this->joueurblanc;
    }

    /**
     * Set statutpartie
     *
     * @param string $statutpartie
     * @return Partie
     */
    public function setStatutpartie($statutpartie)
    {
        $this->statutpartie = $statutpartie;
    
        return $this;
    }

    /**
     * Get statutpartie
     *
     * @return string 
     */
    public function getStatutpartie()
    {
        return $this->statutpartie;
    }
}