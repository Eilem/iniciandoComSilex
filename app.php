<?php

require_once '/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function(){
    return "World say Hello!!!";
});

$app->get("/kkk", function(){
    $http = require '/web/hello.html';
    return $http;
});

$app->get('/mercadoria/{id}', function(){
    
    // Executando o cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://catalogo.s9informatica.com.br/service/mercadoria");
    $result = curl_exec($curl); 
    curl_close($curl);
    
    // dump do resultado
    var_dump($result);
    
});




$app->run();