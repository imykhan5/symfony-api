<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Class Securities
 * @package App\Entity
 * @ORM\Table(name="securities")
 * @ORM\Entity()
 */
class Securities
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
	 * @ORM\Column(name="symbol", type="string")
	 */
	private $symbol;

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
	public function getSymbol()
	{
		return $this->symbol;
	}

	/**
	 * @param string $symbol
	 */
	public function setSymbol($symbol)
	{
		$this->symbol = $symbol;
	}
}
