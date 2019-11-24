<?php

$app->on('cockpit.rest.init', function ($routes) {
  $routes['reviews'] = 'Rezdy\\Controller\\ReviewsApi';
});