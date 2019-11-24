<?php

$app->on('cockpit.rest.init', function ($routes) {
  $routes['reviews'] = 'ReviewsIO\\Controller\\ReviewsApi';
});