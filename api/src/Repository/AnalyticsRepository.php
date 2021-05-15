<?php


namespace App\Repository;


class AnalyticsRepository
{

	/**
	 * @var ObjectManager
	 */
	protected $connection;

	/**
	 * @var array
	 */
	protected $query = [];

	/**
	 * FactsRepository constructor.
	 */
	public function __construct($connection)
	{
		$this->connection = $connection;
	}


	/**
	 * @param string $operator
	 * @param string|array $arg_a
	 * @param string|array $arg_b
	 * @param string $security
	 * @return array
	 */
	public function getAnalytics($operator, $arg_a, $arg_b, $security): array
	{

		if (isset($arg_a['a'])) {
			$data_a = [$arg_a['a'], $arg_a['b']];
			$calc_a = $this->calculate($arg_a['fn'], $this->getData($arg_a['a'], $security), (is_int($arg_a['b'])) ? $arg_a['b'] : $this->getData($arg_a['b'], $security));
		} else {
			$data_a = [$arg_a];
			$calc_a = (is_int($arg_a)) ? $arg_a : $this->getData($arg_a, $security);
		}

		if (isset($arg_b['a'])) {
			$data_b = [$arg_b['a'], $arg_b['b']];
			$calc_b = $this->calculate($arg_b['fn'], $this->getData($arg_b['a'], $security), is_int($arg_b['b']) ? $arg_b['b'] : $this->getData($arg_b['b'], $security));
		} else {
			$data_b = [$arg_b];
			$calc_b = is_int($arg_b) ? $arg_b : $this->getData($arg_b, $security);
		}

		return [
			'total' => $this->calculate($operator, $calc_a, $calc_b),
			'data_a' => $data_a,
			'calc_a' => $calc_a,
			'data_b' => $data_b,
			'calc_b' => $calc_b,
			'operator' => $operator
		];
	}


	/**
	 * @param string $operator
	 * @param float $val_a
	 * @param float $val_b
	 * @return float
	 */
	private function calculate($operator, $val_a, $val_b): float
	{

		$out = 0;

		switch ($operator) {
			case '*':
				$out = $val_a*$val_b;
				break;

			case '-':
				$out = $val_a-$val_b;
				break;

			case '+':
				$out = $val_a+$val_b;
				break;
			case '/':
				$out = $val_a/$val_b;
				break;
		}

		return $out;
	}


	/**
	 * @param string $attribute_name
	 * @param string $security
	 * @return float
	 */
	private function getData($attribute_name, $security): float
	{

		$con = $this->getConnection();

		$sql = "
			SELECT f.value
			FROM facts f
				INNER JOIN  attributes a ON(a.id = f.attribute_id)
				INNER JOIN securities s ON(s.id = f.security_id)
			WHERE a.name = :name
				AND s.symbol = :symbol
			";

		$q = $con->prepare($sql);

		$q->executeQuery(array('name' => $attribute_name, 'symbol' => $security));

		$row = $q->fetch(\PDO::FETCH_ASSOC);

		return (isset($row['value'])) ? $row['value'] : 0;

	}

	/**
	 * @return mixed
	 */
	private function getConnection()
	{
		return $this->connection;
	}


}
