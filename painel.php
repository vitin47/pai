<?php
session_start();

include_once("verifica_login.php");

$nome =$_SESSION['nome'];


?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="css/style4.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <title>Curso Bootstrap 4</title>
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
</head>
<body>
  
  
 
  <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #cce2d3;">
    
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link h5 mb-0 active" href="home.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5 mb-0" href="loja.php"><i class="fas fa-shopping-cart"></i> Loja</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link h5 mb-0" href="#"><i class="fas fa-user-circle"></i><?php
          echo " Olá ADM $nome"?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5 mb-0" href="inserir.php"><i class="fas fa-arrow-alt-circle-up"></i> Inserir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5 mb-0" href="logout.php"><i class="fas fa-sign-out-alt"></i>Deslogar</a>
        </li>
      </ul>
      <form class="form-inline ml-auto">

        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>
      </form>
    </div>

  </nav>
  
  

  
  
  
  
  
 
  
  
  
  
  
  
  


  
  
  
</body>
</html>