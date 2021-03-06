<?php

namespace App\Repository;

use \Doctrine\Persistence\ObjectManager;


class FactsRepository
{


	/**
	 * @var ObjectManager
	 */
	protected $connection;

	/**
	 * FactsRepository constructor.
	 */
	public function __construct($connection)
	{
		$this->connection = $connection;
	}

	/**
	 * @param string $attribute_name
	 * @param string $security
	 * @return array
	 * @throws \Doctrine\DBAL\Driver\Exception
	 * @throws \Doctrine\DBAL\Exception
	 */
	public function getFacts($attribute_name, $security): array
	{

		$con = $this->getConnection();

		$q = $con->prepare(
			"
			SELECT * 
			FROM facts f
				INNER JOIN  attributes a ON(a.id = f.attribute_id)
				INNER JOIN securities s ON(s.id = f.security_id)
			WHERE a.name = :name
				AND s.symbol = :symbol
			"
		);


		$q->executeQuery(array('name' => $attribute_name, 'symbol' => $security));

		return $q->fetchAll();

	}

	/**
	 * @return mixed
	 */
	public function getConnection()
	{
		return $this->connection;
	}

	/**
	 * @param mixed $connection
	 */
	public function setConnection($connection)
	{
		$this->connection = $connection;
	}



}
