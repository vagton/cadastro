<?php
// Database.php

namespace App\Models;

class Database
{
    private static $pdo;

    public function __construct($database_config = null)
    {
        //$host = 'mysql'; // Host do banco de dados
        //$dbname = 'cadastro'; // Nome do banco de dados
        //$username = 'root'; // Nome de usuário do banco de dados
        //$password = 'Senha@123'; // Senha do banco de dados
        //$port = 3306;
        
        //Pega a conexão no "config/database.php", referenciado no parametro:
        include_once __DIR__."/../Config/database.php";
        //Se não estiver passando o nome da conexão, conectará a primeira definida em "Config/database.php"
        $name_database = ($database_config) ? $database_config  : key($config["databases"]);
        $host = $config["databases"][$name_database]["host"];
        $dbname = $config["databases"][$name_database]["database_name"];
        $username = $config["databases"][$name_database]["user"];
        $password = $config["databases"][$name_database]["password"];
        $dbdriver = $config["databases"][$name_database]["driver"];
        $port = $config["databases"][$name_database]["port"];


        try {
             # Atribui o objeto PDO à variável $pdo.
            self::$pdo = new \PDO("$dbdriver:host=$host;port=$port;dbname=$dbname", $username, $password);
            # Garante que o PDO lance exceções durante erros.
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            # Garante que os dados sejam armazenados com codificação UFT-8.
            self::$pdo->exec('SET NAMES utf8');
            # retorna os resultados como um array associativo. Isso significa que cada linha do resultado será um array onde as colunas são associadas aos seus respectivos valores.
            self::$pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erro de conexão com o banco de dados: " . $e->getMessage();
            die();
        }
    }

    public function getConnection($database_config = null)
    {
        # Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$pdo)
        {
            new Database($database_config);
        }
        # Retorna a conexão.
        return self::$pdo;
    }
}
