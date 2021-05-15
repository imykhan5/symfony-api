<?php

namespace App\Controller;

use App\Entity\Attributes;
use App\Entity\Facts;
use App\Entity\Securities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\AnalyticsRepository;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{


	/**
	 * @var AnalyticsRepository
	 */
	protected $AnalyticsRepository;

	/**
	 * @param Request $rquest
	 * @return Response
	 */
	public function indexAction(Request $request): Response
	{

		if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
			$data = json_decode($request->getContent(), true);
			$request->request->replace(is_array($data) ? $data : array());

			$res = $this->getAnalyticsRepository()->getAnalytics($data['expression']['fn'], $data['expression']['a'],  $data['expression']['b'], $data['security']);

		} else {

			$res = [
				'error' => 'Malformed Request!!',
			];
		}

		$res = $this->get('serializer')->serialize($res, 'json');
		$response = new Response($res);
		$response->headers->set('Content-Type', 'application/json');
		return $response;
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
