<?php
session_start();

include_once("verifica_login.php");
include_once("conexao.php");

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
  <div class="headder col-md-12">
  <div class="container-fluid">
    
<div>
      <h2 style="margin:0;text-align:center;font: 400 90px/1.3 'Oleo Script', Helvetica, sans-serif; color: #2b2b2b;text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.22);">Nilton Orquídeas</h2>
    </div>
  </div>
    </div>
  
 
  <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #13b547;">
    
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link h5 mb-0 active" href=""><i class="fas fa-home"></i> Home</a>
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
  
  <?php
  $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
echo $id;
  $result_produto = "SELECT * FROM produtos where id_produto = '$id'";
  $resultado_produto = mysqli_query($conexao,$result_produto);
  $row_produto = mysqli_fetch_assoc($resultado_produto);

  ?>

  
  
  <div class="container">
  <form action="altera_altera.php" method="POST">
 
  <div class="form-group">
    <input type="hidden" id="id" name="id" value="<?php echo $row_produto['id_produto'];?>">
    <label for="nome">Nome do produto</label>
    <input name="nome" type="text" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="" value="<?php echo $row_produto['nome'];?>">

  </div>
  <div class="form-group">
    <label for="valor">Valor do produto R$</label>
    <input name="valor" type="text" class="form-control" id="valor" placeholder="" value="<?php echo $row_produto['valor'];?>">
  </div>
  <div class="form-group">
    <label for="imagem">Imagem do produto</label>
    <input name="imagem" type="text" class="form-control" id="imagem" placeholder="" value="<?php echo $row_produto['image'];?>">
  </div>
  <div class="form-group">
    <label for="descricao">Example textarea</label>
    <textarea name="descricao" type="text" class="form-control" id="descricao" class="form-control" rows="5" value="<?php echo $row_produto['nome'];?>"></textarea>
  </div>
  
  <div class="form-group">
    <label for="categoria">Categoria</label>
    <input name="categoria" type="text" class="form-control" id="categoria" placeholder="" value="<?php echo $row_produto['id_categoria'];?>">
  </div>


  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
  </div>
 
  
  
  
  
  
  
  


  
  
  
</body>
</html>