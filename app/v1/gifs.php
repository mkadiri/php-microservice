<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/v1/gifs/search[/{keyword}]', function (Request $request, Response $response) {
    $keyword = $request->getAttribute('keyword');

    $gifs = (new \src\service\GifFInderServiceFactory())->create()->find($keyword);
    $data = ['data' => $gifs];

    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write(json_encode($data));
});