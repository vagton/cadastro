<?php
namespace App\Models;

require_once __DIR__ . '/Database.php';

use App\Models\Database;


class Repository
{
    public static function getModel($model, $database = false)
    {
        $class = "\\App\\Models\\".ucfirst($model);
        return new $class(Database::getConnection($database));
    }
}