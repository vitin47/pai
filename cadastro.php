<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
      <link rel="stylesheet" href="css/style2.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/jquery.validate.min.js"></script>



    <div class="headder">
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
          <a class="nav-link h5 mb-0" href="index.php"><i class="fas fa-home"></i> Home</a>
        </li>
      <li class="nav-item">
          <a class="nav-link h5 mb-0" href="loja.php"><i class="fas fa-shopping-bag"></i> Loja</a>
        </li>
        <li class="nav-item active">
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
  
      
      <form method="POST" action="conexao_cadastro.php">

          <div class="container">
              <div class="box form-row"></div>
              <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputZip">Nome</label>
      <input type="text" name="nome" placeholder="Nome completo" class="form-control" id="inputZip">
    </div>
              <div class="form-group col-md-5">
      <label for="inputZip">Data de nascimento</label>
      <input type="date" name="data_nascimento" class="form-control" id="inputZip">
    </div>
                  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Senha</label>
      <input type="password" name="senha" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
              <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Endereço</label>
    <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group col-md-5">
    <label for="inputAddress2">Address 2</label>
    <input type="text" name="endereco2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
              </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck" required>
        Concordo com os termos
      </label>
    </div>
  </div>
              <div class="form-group ">
                <button name="cadastro" type="submit" value="cadastrar" class="btn btn-primary btn-lg btn-block"  >Cadastrar</button>
                
            <a href="login.php" style="color: white; text-align:center;">Já sou cadastrado</a>
              </div>
             
              </div>
          

</form>
  </body>
</html>