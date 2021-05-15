<?php


use PHPUnit\Framework\TestCase;
use App\Repository\AnalyticsRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
		if (isset($data['expression']['fn'])) {
			$res = $this->getAnalyticsRepository()->getAnalytics($data['expression']['fn'], $data['expression']['a'],  $data['expression']['b'], $data['security']);
		}

		var_dump($res);
	}


	/**
	 * @return AnalyticsRepository
	 */
	public function getAnalyticsRepository(): AnalyticsRepository
	{
		if ($this->AnalyticsRepository === null) {



			$this->AnalyticsRepository = new AnalyticsRepository($this->getDoctrine()->getConnection());
		}

		return $this->AnalyticsRepository;
	}

}
