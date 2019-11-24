<?php

namespace ReviewsIO\Controller;

use GuzzleHttp\Client;

class ReviewsEndpoint {
	public $api_key;
	public $store;
	private $client;

	public function __construct($base_uri, $store, $api_key) {
		$this->api_key = $api_key;
		$this->store = $store;
		$this->client = new Client([
			'base_uri' => $base_uri
		]);
	}

	public function query($endpoint = '', $options = []) {
		$res = $this->client->request('GET', $endpoint, [
			'query' => array_merge([
				'apiKey' => $this->api_key,
				'store' => $this->store
			], $options)
		]);
		return json_decode($res->getBody());
	}

	public function renderResponse($res, $return_fn) {

		/* $status = $res->requestStatus;

		if ( !$status->success ) {
			return $status;		
		} */

		return $return_fn($res);
	}

}

?>