<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/code/count', 'Game\CodeController:sumCodeViews');
$app->get('/code/{id}', 'Game\CodeController:getCode');

