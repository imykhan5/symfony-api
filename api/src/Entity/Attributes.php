<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Attributes
 * @package App\Entity
 * @ORM\Table(name="attributes")
 * @ORM\Entity()
 */
class Attributes
{


	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="name", type="string")
	 */
	private $name;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}


}
