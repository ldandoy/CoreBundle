<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPack\CoreBundle\Entity\Config
 *
 * @ORM\Table(name="config")
 * @ORM\Entity(repositoryClass="StartPack\CoreBundle\Repository\ConfigRepository")
 */
class Config {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string $key
	 *
	 * @ORM\Column(name="key", type="string", length=50, nullable=false)
	 */
	private $key;

	/**
	 * @var string $value
	 *
	 * @ORM\Column(name="value", type="text", nullable=false)
	 */
	private $value;

	/**
	 * @var string $label
	 *
	 * @ORM\Column(name="label", type="string", length=255, nullable=false)
	 */
	private $label;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set key
	 *
	 * @param string $key
	 * @return Config
	 */
	public function setKey($key) {
		$this->key = $key;

		return $this;
	}

	/**
	 * Get key
	 *
	 * @return string 
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * Set value
	 *
	 * @param string $value
	 * @return Config
	 */
	public function setValue($value) {
		$this->value = $value;

		return $this;
	}

	/**
	 * Get value
	 *
	 * @return string 
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Set label
	 *
	 * @param string $label
	 * @return Config
	 */
	public function setLabel($label) {
		$this->label = $label;

		return $this;
	}

	/**
	 * Get label
	 *
	 * @return string 
	 */
	public function getLabel() {
		return $this->label;
	}
}
