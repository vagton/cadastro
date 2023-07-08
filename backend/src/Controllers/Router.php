<?php

namespace App\Controllers;

use App\Controllers\RouteSwitch;
use App\Controllers\CategoriasController;
use App\Controllers\ProdutosController;

require_once __DIR__ . '/RouteSwitch.php';
require_once __DIR__ . '/CategoriasController.php';
require_once __DIR__ . '/ProdutosController.php';
require_once __DIR__ . '/../Config/web.php';

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);
        $route = str_replace($GLOBALS['web']['project'], '', $route);
        $route = str_replace($GLOBALS['web']['basepath'], '', $route);
        $route = str_replace('/', '', $route);

 
        //passagem de parametros por querystring
        $request = $_SERVER['QUERY_STRING'];
        $data = null;
        if (!empty($request)) {
            $route = str_replace("?", "", $route);
            $route = str_replace($request, "", $route);
            $parametes = explode('&', $request);
            foreach ($parametes as $k => $v) {
                $item = explode("=", $v);
                $data[$item[0]] = $item[1];
            }
        }
        if ($route === '' || $route === 'login') {
            $this->login();
        } elseif ($route === 'home') {
            $this->home();
        } elseif ($route === 'categorias') {
            $cad = new \App\Controllers\CategoriasController();
            $cad->listCategorias();
        } elseif ($route === 'produtos') {
            $prod = new \App\Controllers\ProdutosController();
            $prod->listProdutos();
        } else {
            $this->$route($data);
        }
    }
}
