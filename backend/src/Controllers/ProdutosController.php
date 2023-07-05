<?php
namespace App\Controllers;
// ProdutosController.php
require __DIR__ . '/../Models/Produto.php';

use App\Models\Produto;

class ProdutosController
{
    public function handle()
    {
        // Verificar o método da requisição
        $method = $_SERVER['REQUEST_METHOD'];

        // Executar a ação apropriada com base no método
        switch ($method) {
            case 'GET':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $this->buscarProduto($id);
                } else {
                    $this->listProdutos();
                }
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

    public function listProdutos()
    {
        // Obter todos os produtos do modelo
        $produto = new Produto();
        $produtos = $produto->listar();

        // Retornar os produtos como resposta JSON
        $responseBody = json_encode($produtos);
        header('Content-Type: application/json');
        echo $responseBody;
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

    public function buscarProduto($id)
    {
        $produto = new Produto();
        $produtoEncontrado = $produto->buscarPorId($id);

        if ($produtoEncontrado) {
            $responseBody = json_encode($produtoEncontrado);
            header('Content-Type: application/json');
            echo $responseBody;
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }
}
