<?php

namespace Magpie;

class Token
{
	CONST URI = '/v1/tokens';
	private $baseUrl;
	private $isSandbox;
	private $request;
	private $key;

	public function __construct($isSandbox = false, $key = null) {
		$this->isSandbox = $isSandbox;
		$this->request   = new Request($this->isSandbox, self::URI);
		$this->key       = $key;
	}	

	/**
	 * @param  Card   $card [description]
	 * @return [type]       [description]
	 */
	public function create(
		$name,
		$number,
		$expMonth,
		$expYear,
		$cvc
	) {
		$response = $this->request->post(self::URI, $this->key, array(
			'card' => array(
				'name'      => $name,
				'number'    => $number,
				'exp_month' => $expMonth,
				'exp_year'  => $expYear,
				'cvc'       => $cvc
			)
		));
		$response->successCode(201);
		
		return $response;
	}

	public function get($tokenId) {
		$response = $this->request->get(
			self::URI . '/' . $tokenId,
			$this->key
		);
		$response->successCode(200);

		return $response;
	}
}