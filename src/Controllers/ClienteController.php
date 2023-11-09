<?php

namespace Unialfa\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class ClienteController {
    public function getClientes(ServerRequestInterface $request, ResponseInterface $response, $args) {
        $clientes = [
            ['id' => 1, "nome" => "midras 1" ],
            ['id' => 2, "nome" => "Cliente 2" ],
            ['id' => 3, "nome" => "Cliente 3"]
        ];
    
        $response->getBody()->write(json_encode($clientes));
    
        return $response->withHeader('Content-type', 'application/json');
    }

    public function postCliente(ServerRequestInterface $request, ResponseInterface $response, $args){
        $data = $request->getBody()->getContents();

        $responseBody = [
            'message' => 'cliente cadastrado com sucesso',
            'data' => json_decode($data)
        ];

        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-type', 'application/json')->withStatus(201);

    }
}