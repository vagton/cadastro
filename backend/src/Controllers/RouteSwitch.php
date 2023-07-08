<?php

namespace App\Controllers;

abstract class RouteSwitch
{
    private $front;
    private $basepath;
    private $realpath;

    public function __construct($front = null)
    {
        $this->front = $front;
        $this->basepath = $GLOBALS['web']['basepath'];
        $this->realpath = $GLOBALS['web']['realpath'];
    }

    protected function index()
    {
        if (!empty($this->front)) {
            require_once $this->realpath . $this->basepath . "frontend/$this->front/index.php";
        } else {
            var_dump($this->realpath . $this->basepath . "index.php");
            require_once $this->realpath . $this->basepath . "index.php";
        }
    }

    protected function login()
    {
        require_once $this->realpath . $this->basepath . 'login.php';
    }

    protected function home()
    {
        require_once $this->realpath . $this->basepath . 'home.php';
    }

    protected function sair()
    {
        require_once $this->realpath . $this->basepath . 'sair.php';
    }

    protected function curso($request)
    {
        require_once $this->realpath . $this->basepath . 'curso/index.php';
    }

    protected function curso_add($request)
    {
        require_once $this->basepath . 'curso/add.php';
    }
    protected function curso_edit($request)
    {
        require_once $this->basepath . 'curso/edit.php';
    }
    protected function curso_delete($request)
    {
        require_once $this->realpath . $this->basepath . 'curso/delete.php';
    }

    public function __call($name, $arguments)
    {
        http_response_code(404);
        require_once $this->realpath . $this->basepath . 'not-found.php';
    }
}
