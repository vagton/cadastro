<?php
// Database.php

namespace App\Models;

class Database
{
    private $pdo;

    public function __construct()
    {
        $host = 'mysql'; // Host do banco de dados
        $dbname = 'cadastro'; // Nome do banco de dados
        $username = 'root'; // Nome de usuário do banco de dados
        $password = 'Senha@123'; // Senha do banco de dados
        $port = 3307;

        try {
            $this->pdo = new \PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            // Configurar opções do PDO, se necessário
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erro de conexão com o banco de dados: " . $e->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
