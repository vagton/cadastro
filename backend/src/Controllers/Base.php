<?php
namespace App\Controllers;
class Base
{
    public static function redirect($uri)
    {
        $basepath = $GLOBALS['web']['basepath'];
        //header("location:$basepath$uri");]
        echo "<script>window.location.href = '$uri/';</script>";
    }

    public static function alert($message, $type='primary'){
        echo "<div class='alert alert-$type' role='alert'>$message</div>";
    }

    public static function cards($imagem, $titulo, $descricao, $link){
        $titulo = strtoupper($titulo);
        $view = "<div class='col-md-2'>
          
        <div class='shadow-lg p-3 mb-5 bg-white rounded'>
            <div class='card'>
                <img src='$imagem' class='card-img-top' style='width:100%;height:180px'>
                <div class='card-body'>
                    <h6 class='card-title' style='color:#666'><b>$titulo</b></h6>
                    <p class='card-text' style='color:#666'>$descricao</p>
                    <a href='$link' target='_blank' class='btn btn-success' style='border-radius: 25px;width:100%'>VER CURSO</a>
                </div>
            </div>
        </div>
        </div>";

      echo $view;
    }



    public static function render($view){
        require_once($view);
    }


}