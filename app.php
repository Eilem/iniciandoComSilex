<?php

require_once '/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->get('/', function(){
    return "World say Hello!!!";
});

$app->get("/kkk", function(){
    $http = require '/web/hello.html';
    return $http;
});

$app->get('/mercadoria/{id}', function( $id){
    
    // Executando o cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://catalogo.s9informatica.com.br/service/mercadoria/".$id);
    $result = curl_exec($curl); 
    curl_close($curl);
    
    // dump do resultado
    var_dump($result);
    return $result;
    
});

$app->get('/obtemContratos/{id}', function(  $id ){
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://catalogo.s9informatica.com.br/service/mercadoria/".$id);
    $result = curl_exec($curl); 
    curl_close($curl);
    
    // dump do resultado
    var_dump($result);
    return $result;
});


/**
          //Sincronizar dados do card com o BC
       $("#btn-sincronizar").click( function(){

        var identificador = $("#hiddenIdMercadoria").val();
        identificador = identificador.toString();

            $.ajax({
                url : "http://api.mybookcard.com/api/v1/cards",
                method : "POST",
                data: {
                    identificador : identificador, 
                    tipo: 7,
                    servidor: 4,
                    agente: $("#selectColecionador").val(),
                    book: $("#selectBook").val()
                },
                success: function(retorno){
                    alert("criado com sucesso");
                },
                error: function(retorno){
                    alert("deu bosta");
                }
            });
        });
 */

$app->sincronizarContratos('/sincronizar', function(){

    
    
});

$app->run();