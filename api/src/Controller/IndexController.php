<?php

namespace App\Controller;

use App\Entity\Attributes;
use App\Entity\Facts;
use App\Entity\Securities;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\FactsRepository;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends AbstractController
{


	/**
	 * @var FactsRepository
	 */
	protected $FactsRepository;

	/**
	 * @param Request $rquest
	 * @return Response
	 */
	public function indexAction(Request $request): Response
	{

		if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
			$data = json_decode($request->getContent(), true);
			$request->request->replace(is_array($data) ? $data : array());



			/*
				{
				  "expression": {"fn": "*", "a": "sales", "b": 2},
				  "security": "ABC"
				}
			 */


			switch ($data['expression']['fn']) {
				case '*':
					// print_r(array($data['expression']['a'], $data['expression']['b']));

					$res = $this->getFactsRepository()->getFacts($data['expression']['a'], $data['security']);
					break;
			}



//
//
//			// $em = $this->getDoctrine()->getManager();
//			// $em->getConnection()->connect();
//			// $connected = $em->getConnection()->isConnected();
//
//
//			$res = $this->getDoctrine()->getRepository(Securities::class)->findAll();
//



			$res = $this->get('serializer')->serialize($res, 'json');

			$response = new Response($res);

			$response->headers->set('Content-Type', 'application/json');
			return $response;

		}


	}

	/**
	 * @return FactsRepository
	 */
	public function getFactsRepository(): FactsRepository
	{
		if ($this->FactsRepository === null) {
			$this->FactsRepository = new FactsRepository($this->getDoctrine()->getConnection());
		}
		return $this->FactsRepository;
	}




}
