<?php

namespace ReviewsIO\Controller;

use \LimeExtra\Controller;
use ReviewsIO\Controller\ReviewsEndpoint;

class ReviewsApi extends Controller {
	private $reviews;

	public function __construct($options) {
		parent::__construct($options);
        $this->reviews = new ReviewsEndpoint(
			'https://api.reviews.io/',
			$this->app['config']['reviews-io']['store'],
			$this->app['config']['reviews-io']['api_key']
		);
	}

    public function index() {

		$res = $this->reviews->query('product/reviews/all');

		return $this->reviews->renderResponse($res, function($res) {
			return ['reviews' => $res->reviews];
		});
	}

	public function product($sku) {

		if (empty($sku)) {
			return ['error' => 'You must provide a product sku.'];
		}
		$res = $this->reviews->query('product/review', [
			'sku' => $sku
		]);

		return $this->reviews->renderResponse($res, function($res) {
			return ['reviews' => $res->reviews];
		});
	}

}

?>