<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';

use App\Models\Database;

class Produto
{
    private $id;
    private $nome;
    private $preco;
    private $categoriaId;
    private $pdo;

    // Construtor
    public function __construct($id = null, $nome = null, $preco = null, $categoriaId=null)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoriaId = $categoriaId;
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Métodos Getters e Setters
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getCategoriaId()
    {
        return $this->categoriaId;
    }

    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    // Métodos adicionais
    public function salvar()
    {
        // Lógica para salvar o produto no banco de dados
        // Utilize a conexão estabelecida em database.php
    }

    public function atualizar()
    {
        // Lógica para atualizar o produto no banco de dados
        // Utilize a conexão estabelecida em database.php
    }

    public function excluir()
    {
        // Lógica para excluir o produto do banco de dados
        // Utilize a conexão estabelecida em database.php
    }

    public function listar()
    {
        // Lógica para listar todos os produtos do banco de dados
        $query = "SELECT * FROM produtos";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $produtos;
    }

    public static function buscarPorId($id)
    {
        // Lógica para buscar um produto por ID no banco de dados
        if(!empty($id)){
            $query = "SELECT * FROM produtos WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $produtos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $produtos;
        }else{
            return null;
        }
    }
}

