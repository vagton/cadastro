<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $primary_key = "id";

    public function logar($email, $senha){
        $query = "select * from {$this->table} WHERE email = :email AND senha = md5(:senha)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}