<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o autoloader do Composer
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../src/Controllers/ProdutosController.php';
require __DIR__ . '/../src/Controllers/CategoriasController.php';

// Importar as classes dos controladores
use App\Controllers\CategoriasController;
use App\Controllers\ProdutosController;

// Definir o mapeamento das rotas
$routes = [
    '/backend/public/categorias' => CategoriasController::class,
    '/backend/public/produtos' => ProdutosController::class . ':listProdutos' // Atualizado para usar o nome correto do método
];

// Obter a URL da requisição
$requestUrl = $_SERVER['REQUEST_URI'];

// Verificar se a rota está mapeada
if (array_key_exists($requestUrl, $routes)) {

        // Instanciar o controlador correspondente
        $controllerMethod = $routes[$requestUrl];
        list($controllerClassName, $methodName) = explode(':', $controllerMethod);
    
        if (!empty($controllerClassName)) {
            $controller = new $controllerClassName();
            var_dump($controller);
    
            // Verificar se o método existe no controlador
            if (method_exists($controller, $methodName)) {
                // Chamar o método apropriado no controlador
                $controller->$methodName();
            } else {
                echo 'Método não encontrado no controlador.';
            }
        } else {
            echo 'Controlador não encontrado.';
        }

} else {
    // Rota não encontrada
    echo 'Rota não encontrada.';
}

