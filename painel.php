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
    <a class="navbar-brand" href="home.php">
      <img src="img/97d4253d79a9e59f19df904136673fc9---cone-de-flor-de-orqu--dea-by-vexels.png" width="30" height="30" alt="">
    </a>
    <a class="navbar-brand" href="home.php">Nilton Orquídeas</a>
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
          echo " Olá $nome"?></a>
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
  
  
  <div class="carouselSite">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="20000">
          <img src="img/SDA.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
          </div>
        </div>
        <div class="carousel-item" data-interval="10000">
          <img src="img/SSDA.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="carousel-item" data-interval="10000">
          <img src="img/1231.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>sdaaaaaaaaasus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
  
  <div class="tudap">
    <div class="diev">
      <div class="row">
        <div class="col-md-5">
          
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive embed-responsive-16by9"src="https://www.youtube.com/embed/nuyO6zMSNwQ?start=9" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-2">
          <p>aaaaa</p>
        </div>
        
        
        
        
      </div>
    </div>
  </div>
  

  
  
  <div class="footer">
    DIREITOS RESERVADOS
  </div>
  
  
  
  
  
  
  


  
  
  
</body>
</html>