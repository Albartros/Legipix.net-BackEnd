<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $response->withRedirect('http://legipix.net');
});

$app->group('/api', function() {
    $this->get('', function ($request, $response, $args) {
        return $this->renderer->render($response, 'index.phtml', $args);
    });
});
