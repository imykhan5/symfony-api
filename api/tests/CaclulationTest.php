<?php


use PHPUnit\Framework\TestCase;
use App\Repository\AnalyticsRepository;

class CaclulationTest extends TestCase
{


	/**
	 * @var AnalyticsRepository
	 */
	protected $AnalyticsRepository;

	/**
	 * Test single level
	 */
	public function testSingleLevel(): void
	{

		$data = [
			'expression' => [
				'fn' => '*',
				'a' => 'sales',
				'b' => 2
			],
			'security' => 'ABC'
		];

		$res = $this->getAnalyticsRepository()->getAnalytics($data['expression']['fn'], $data['expression']['a'],  $data['expression']['b'], $data['security']);

		$this->assertEquals(8, $res['total']);
	}

	/**
	 * Multi level comparison test
	 */
	public function testMultiLevel(): void
	{

		$data = [
			'expression' => [
				'fn' => '-',
				'a' => [
					'fn' => '-',
					'a' => 'eps',
					'b' => 'shares',
				],
				'b' => [
					'fn' => '-',
					'a' => 'assets',
					'b' => 'liabilities'
				],
			],
			'security' => 'CDE'
		];

		$res = $this->getAnalyticsRepository()->getAnalytics($data['expression']['fn'], $data['expression']['a'],  $data['expression']['b'], $data['security']);

		$this->assertEquals(-21, $res['total']);
	}

	/**
	 * @return AnalyticsRepository
	 */
	public function getAnalyticsRepository(): AnalyticsRepository
	{
		if ($this->AnalyticsRepository === null) {



			$this->AnalyticsRepository = new AnalyticsRepository($this->getDbConnection());
		}

		return $this->AnalyticsRepository;
	}


	/**
	 * Quick PDO connection using credentials in .env file
	 * @return \PDO
	 */
	public function getDbConnection(): PDO
	{

		$dotenv = Dotenv\Dotenv::createImmutable('../');
		$dotenv->load();

		// mysql://securities:securities@172.17.0.1:3306/securities

		preg_match('/mysql\:\/\/(.*)\:(.*)\@(.*):3306\/(.*)/', $_ENV['DATABASE_URL'], $matches, PREG_OFFSET_CAPTURE);
		print_r($matches[1][0]);

		$dsn = 'mysql:dbname='.$matches[4][0].';host='.$matches[3][0];
		$user = $matches[1][0];
		$password = $matches[2][0];

		return new \PDO($dsn, $user, $password);
	}

}
