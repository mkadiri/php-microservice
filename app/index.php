<?php

require __DIR__ . '/vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$settings = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];

$container = new \Slim\Container($settings);
$app = new \Slim\App($container);

foreach (glob('v1/*.php') as $route) {
    require $route;
}

$secret = getenv('JWT_SECRET');
$algorithm = getenv('JWT_ALGORITHM');

$app->add(new \Slim\Middleware\JwtAuthentication([
    "secret"    => $secret,
    "algorithm" => $algorithm,
    "secure"    => false,
    "error" => function (Request $request, Response $response) {
        $data["status"] = "error";
        $data["message"] = "Authentication failed";

        return $response->withHeader("Content-Type", "application/json")->write(
            json_encode($data)
        );
    }
]));


$app->run();