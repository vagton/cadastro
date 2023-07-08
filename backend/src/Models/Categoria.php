<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Model.php';

use App\Models\Database;
use App\Models\Model;


class Categoria Extends Model
{
    private $id;
    private $nome;
    protected $table = "categoria";
    protected $primary_key = "id";

    // Construtor
    public function __construct($id = null, $nome = null)
    {
        $this->id = $id;
        $this->nome = $nome;
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

    public function listar()
    {
        // Lógica para listar todos as categorias do banco de dados
        $query = "SELECT * FROM categorias";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $categorias = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $categorias;
    }

    public static function buscarPorId($id)
    {
        // Lógica para buscar um produto por ID no banco de dados
        // Utilize a conexão estabelecida em database.php
    }
}