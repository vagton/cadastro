<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';

class Categoria
{
    private $id;
    private $nome;

    // Construtor
    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
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
}