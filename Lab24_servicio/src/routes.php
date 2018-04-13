<?php

include("util.php");

use Slim\Http\Request;
use Slim\Http\Response;

// Routes


//el shiste es que se usa el request GET para obtener información, POST para añadir
//una entrada a una tabla de datos, DELETE para eliminar una, PATCH para cambiar...

$app->get('/words', function (Request $request, Response $response, array $args) {
    return json_encode(getWords());
});

$app->get('/words/{id}', function (Request $request, Response $response, array $args) {
    return json_encode(getWordById($args['id']));
});


$app->post('/words', function(Request $request, Response $response, array $args){
    postWord($request->getBody());
});


$app->delete('/words/{id}', function (Request $request, Response $response, array $args) {
    deleteWordById($args['id']);
});








/*
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    //return $this->renderer->render($response, 'index.phtml', $args);
    echo "hola";
});
*/