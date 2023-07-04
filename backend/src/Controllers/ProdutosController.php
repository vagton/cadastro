<?php
// ProdutosController.php

namespace App\Controllers;

use App\Models\Produto;
use Psr\Http\Message\ResponseInterface as Response;

class ProdutosController
{
    public function handle()
    {
        // Verificar o método da requisição
        $method = $_SERVER['REQUEST_METHOD'];

        // Executar a ação apropriada com base no método
        switch ($method) {
            case 'GET':
                $this->listProdutos();
                break;
            case 'POST':
                $this->createProduto();
                break;
            // Outros métodos como PUT, DELETE podem ser implementados aqui
            default:
                // Método não suportado
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }

    public function listProdutos(Response $response)
    {
        // Obter todos os produtos do modelo
        $produtos = Produto::listar();

        // Retornar os produtos como resposta JSON
        //header('Content-Type: application/json');
        //echo json_encode($produtos);
        $response->getBody()->write(json_encode($produtos));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function createProduto()
    {
        // Obter os dados do corpo da requisição POST
        $data = json_decode(file_get_contents('php://input'), true);

        // Criar um novo produto com os dados fornecidos
        $produto = new Produto();
        $produto->setNome($data['nome']);
        $produto->setDescricao($data['descricao']);

        // Salvar o novo produto no banco de dados
        $produto->save();

        // Retornar o novo produto criado como resposta JSON
        header('Content-Type: application/json');
        echo json_encode($produto);
    }
}
