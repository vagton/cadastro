<!doctype html>
<html lang="en">
  <head>
  <link href="imagens/favicon1.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Site</title>
  </head>
  <body>
<?php
  if (isset($_SESSION['mensagem'][0]) && !empty($_SESSION['mensagem'][0]['status'] && !empty($_SESSION['mensagem'][0]['description']))){
    ?>
  <div class="alert alert-<?=$_SESSION['mensagem'][0]['status']?>" role="alert">
    <?=$_SESSION['mensagem'][0]['description']?>
  </div>
<?php
  }
?>