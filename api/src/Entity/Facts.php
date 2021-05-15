<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Attributes
 * @package App\Entity
 * @ORM\Table(name="facts")
 * @ORM\Entity()
 */
class Facts
{


	/**
	 * @var int
	 * @ORM\Column(name="security_id", type="integer")
	 */
	private $security_id;


	/**
	 * @var int
	 * @ORM\Column(name="attribute_id", type="integer")
	 */
	private $attribute_id;


	/**
	 * @var float
	 * @ORM\Column(name="value", type="float")
	 */
	private $value;

	/**
	 * @return int
	 */
	public function getSecurityId()
	{
		return $this->security_id;
	}

	/**
	 * @param int $security_id
	 */
	public function setSecurityId($security_id)
	{
		$this->security_id = $security_id;
	}

	/**
	 * @return int
	 */
	public function getAttributeId()
	{
		return $this->attribute_id;
	}

	/**
	 * @param int $attribute_id
	 */
	public function setAttributeId($attribute_id)
	{
		$this->attribute_id = $attribute_id;
	}

	/**
	 * @return float
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param float $value
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}
}
