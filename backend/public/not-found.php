<style>
html, body {height:100%;}
html {display:table; width:100%;}
body {display:table-cell; text-align:center; vertical-align:middle;}

.error-logo {
  display: inline-block;
  margin-bottom: 2rem;
}
.error-code {
  margin: 0 0 1rem;
  font-size: 6rem;
  line-break: 1;
}
</style>    
<?php require_once('header-login.php');?>

<div class="container">
<a href="<?=$GLOBALS['web']['basepath']?>/home">
<img class="error-logo" src="<?=$GLOBALS['web']['basepath']?>/public/imagens/logo.png">
</a>
<h1 class="error-code">404</h1>
<h2>Visualização não encontrada.</h2>
<a href="<?=$GLOBALS['web']['basepath']?>/home" class="btn btn-secondary"><span class="fa fa-home" aria-hidden="true"></span> Página inicial</a>

</div>

