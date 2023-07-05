<?php
namespace App\Controllers;
// CategoriasController.php
require __DIR__ . '/../Models/Categoria.php';

use App\Models\Categoria;

class CategoriasController
{
    public function handle()
    {
        // Verificar o método da requisição
        $method = $_SERVER['REQUEST_METHOD'];

        // Executar a ação apropriada com base no método
        switch ($method) {
            case 'GET':
                $this->listCategorias();
                break;
            case 'POST':
                $this->createCategoria();
                break;
            // Outros métodos como PUT, DELETE podem ser implementados aqui
            default:
                // Método não suportado
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }

    public function listCategorias()
    {
         // Obter todos os produtos do modelo
         $categoria = new Categoria();
         $categorias = $categoria->listar();
 
         // Retornar os produtos como resposta JSON
         $responseBody = json_encode($categorias);
         header('Content-Type: application/json');
         echo $responseBody;
    }

    public function createCategoria()
    {
        // Obter os dados do corpo da requisição POST
        $data = json_decode(file_get_contents('php://input'), true);

        // Criar uma nova categoria com os dados fornecidos
        $categoria = new Categoria();
        $categoria->setNome($data['nome']);
        $categoria->setDescricao($data['descricao']);

        // Salvar a nova categoria no banco de dados
        $categoria->save();

        // Retornar a nova categoria criada como resposta JSON
        header('Content-Type: application/json');
        echo json_encode($categoria);
    }
}
