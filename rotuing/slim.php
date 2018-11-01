<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 12.10.18
 * Time: 0:50
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$config = ['settings' => [
	'addContentLengthHeader' => false,
]];

$app = new \Slim\App($config);

$app->get('/hello/{name}', function (Request $request, Response $response) {
	$name = $request->getAttribute('name');
	$response->getBody()->write("Hello, $name");

	return $response;
});
$app->run();

