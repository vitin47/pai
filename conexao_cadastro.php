<?php

include_once "conexao.php";


$nome = $_POST['nome'];
$nascimento = $_POST['data_nascimento'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$endereco = $_POST['endereco'];
$endereco2 = $_POST['endereco2'];

$sql = "INSERT INTO user_cad (nome, data_nasc, email, senha, endereco1, endereco2) VALUES
('$nome','$nascimento','$email', '$senha', '$endereco', '$endereco2')";
$salvar = mysqli_query($conexao,$sql);
$linhas = mysqli_affected_rows($conexao);






mysqli_close($conexao);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
      <link rel="stylesheet" href="css/style4.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
      <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #cce2d3;">
    <a class="navbar-brand" href="index.php">
    <img src="img/97d4253d79a9e59f19df904136673fc9---cone-de-flor-de-orqu--dea-by-vexels.png" width="30" height="30" alt="">
  </a>
  <a class="navbar-brand" href="index.php">Nilton Orquídeas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link h5 mb-0" href="#"><i class="fas fa-home"></i> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link h5 mb-0" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link h5 mb-0" href="cadastro.php"><i class="fas fa-sign-out-alt"></i> Cadastro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link h5 mb-0" href="login.php"><i class="fas fa-user-circle"></i> Login</a>
      </li>
    </ul>
          <form class="form-inline ml-auto">
    <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>
      </form>
  </div>
        </nav>
      <div class="container">
          <?php
          if($linhas == 1){
                echo "Você foi cadastrado com sucesso<br>";
                header("Refresh: 3;url=login.php");
            }else{
              echo "Houve um erro no cadastro<br>";
              echo "Tente novamente com dados corretos";
              header("Refresh: 3;url=cadastro.php");
          }
          ?>
</div>
    </body>
</html>