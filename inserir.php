<?php
session_start();

include_once("verifica_login.php");

$nome =$_SESSION['nome'];

if(isset($nome) && $_SESSION['id_usuario'] == 0){
  header("Location:index.php");
}


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
  <div class="headder">
  <div class="container-fluid">
    
<div>
      <h2 style="margin:0;text-align:center;font: 400 90px/1.3 'Oleo Script', Helvetica, sans-serif; color: #2b2b2b;text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.22);">Nilton Orquídeas</h2>
    </div>
  </div>
    </div>
  <?php
        if(!isset($nome)):
    ?>
        <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #13b547;">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link h5 mb-0 active" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link h5 mb-0" href="loja.php"><i class="fas fa-shopping-bag"></i> Loja</a>
                </li>
                <li>
                  <a class="nav-link h5 mb-0" href="cadastro.php"><i class="fas fa-sign-out-alt"></i> Cadastro</a>
                </li>
                <li>
                  <a class="nav-link h5 mb-0" href="login.php"><i class="fas fa-user-circle"></i> Login</a>
                </li>
            </ul>
            <form class="form-inline ml-auto">    
                <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>
            </form>
       </div>
        </nav>
    <?php
        endif;
    ?>


  <?php
        if(isset($nome) && $_SESSION['id_usuario'] == 0):
    ?> 
      <nav class="navbar navbar-expand-lg navbar-light "style="background-color: #169f41;">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link h5 mb-0 active" href="index.php"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link h5 mb-0" href="loja.php"><i class="fas fa-shopping-bag"></i> Loja</a>
                </li> 
                       
                       
                  <li class="nav-item">
                <a class="nav-link h5 mb-0" href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a> 
               </li>
                  <li>
                  <a class="nav-link h5 mb-0" href="#"><i class="far fa-hand-spock"></i><?php echo " Olá $nome"?></a>
                  </li>
          </ul>
          <form class="form-inline ml-auto">
              <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>    
              <a class="nav-link h5 mb-0" href="logout.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Deslogar</a>
            </form>
        </div>
      </nav>
  <?php
    endif;
  ?>

  <?php
if(isset($nome) && $_SESSION['id_usuario'] == 1):?>
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
          <a class="nav-link h5 mb-0" href="altera.php"><i class="fas fa-exchange-alt"></i> Trocar produto</a>
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
<?php endif;
  ?>
  
  

  
  
  <div class="container">
  <form action="inserir_valida.php" method="POST">
 
  <div class="form-group">
    <label for="nome">Nome do produto</label>
    <input name="nome" type="text" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="">

  </div>
  <div class="form-group">
    <label for="valor">Valor do produto R$</label>
    <input name="valor" type="text" class="form-control" id="valor" placeholder="">
  </div>
  <div class="form-group">
    <label for="imagem">Imagem do produto</label>
    <input name="imagem" type="text" class="form-control" id="imagem" placeholder="">
  </div>
  <div class="form-group">
    <label for="descricao">Descrição do produto</label>
    <textarea name="descricao"  class="form-control" id="descricao" class="form-control" rows="5"></textarea>
  </div>
  
  <div class="form-group">
    <label for="categoria">Categoria</label>
    <input name="categoria" type="password" class="form-control" id="categoria" placeholder="">
  </div>


  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
  </div>
 
  
  
  
  
  
  
  


  
  
  
</body>
</html>