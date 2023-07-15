<style>
body {
  background-image: url("https://img.freepik.com/free-vector/network-mesh-wire-digital-technology-background_1017-27428.jpg?w=740&t=st=1687789612~exp=1687790212~hmac=43dfd0adfe1a4e503d55e39bb1acf27efa9a12548c5c0ac1eb4e8e35434796e6");
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  height: 280px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: 5px;
}
</style>
<?php
require_once(__DIR__ . "/../src/Models/Repository.php");
require_once(__DIR__ . "/../src/Controllers/Base.php");
require_once(__DIR__ . "/../src/Models/Usuario.php");
use App\Models\Repository;
use App\Controllers\Base;
if (!empty($_SESSION['user']))
    Base::redirect('home');
if (!empty($_POST))
{
    $usuario = Repository::getModel("Usuario");
    $usr = $usuario->logar($_POST['email'], $_POST['senha']);
    if($usr){
        $_SESSION['mensagem'] = [["status" => "success", "description" => ""]];
        $_SESSION['user'] = $usr;
        $_SESSION['user']['firstname'] = explode(" ",$_SESSION['user']['nome'])[0];
        Base::redirect('home');
    }else{
        $_SESSION['mensagem'] = [["status" => "info", "description" => "<b>Por Favor, verifique suas credenciais.</b>"]];
    
    }
}
require_once('header-login.php');
?>
   <div class="container">
   <form method="post" action="../../<?=$GLOBALS['web']['basepath']?>login">
    <div id="login">
        <div class="container">
        <h3 class="text-center text-white"><img src="imagens/logo.png" width="80px" height="50px"></h3>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-dark">Autenticação</h3>
                            <div class="form-group">
                                <label for="email" class="text-primary">USUÁRIO</label><br>
                                <input type="text"  maxlength="100" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="senha" class="text-primary">SENHA</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group offset-10">
                                <input type="submit" name="submit" class="btn btn-primary" value="Entrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
<?php 
require_once('footer-login.php');
?>