<?php
require_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";

$sql = "SELECT * FROM user_cad where nome like '%$filtro%'";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="css/style5.css">
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
    <a class="navbar-brand" href="index.html">
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
          <a class="nav-link h5 mb-0" href="cadastro.html"><i class="fas fa-sign-out-alt"></i> Cadastro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5 mb-0" href="login.html"><i class="fas fa-user-circle"></i> Login</a>
        </li>
      </ul>
      <form class="form-inline ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>
      </form>
    </div>
  </nav>
  <div class="conteudo2">
    <nav id="nav1">
      <ul class="menu">
        <a href="cad.php"><li>Cadastro</li></a>
        <li>Consulta</li>
      </ul>
    </nav>
  </div>
  <div class="conteudo">
   
    <div class="all">
      <form method="get" action="" >Filtrar por:<input class="input" type="text" name="filtro" class="ml-2" autofocus>
        
        <button class="botao1" type="submit"><i class="fas fa-search" style="color: white;"></i> Procurar</button>
      </form>
    </div>
    <?php
    echo "<br>";
    print "Resultado da pesquisa com a palavra ". ":"."<strong> '$filtro'</strong><br><br>";

    echo "Existem $registros Iten(s) :<br>";
    echo "<br>";

    while ($exibe_Registros = mysqli_fetch_array($consulta)) {
      $nome = $exibe_Registros[1];
      $data = $exibe_Registros[2];
      $email= $exibe_Registros[3];
      $endereco = $exibe_Registros[5];
      $endereco2= $exibe_Registros[6];
      print "<article>";
      echo "<strong>NOME</strong> :$nome<br>";
      echo "<strong>NASCIMENTO </strong>:$data<br>";
      echo "<strong>EMAIL</strong> :$email<br>";
      echo "<strong>ENDEREÇO </strong>:$endereco2";
      print "</article>";
    }


    mysqli_close($conexao);
    ?>
    
    
    
  </div>
</body>
</html>
