<?php
session_start();
$product_ids = array();
//session_destroy();

if(isset($_SESSION['nome'])){
$nome =$_SESSION['nome'];
}



if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shop_car'])){


        $cont = count($_SESSION['shop_car']);



        $product_ids = array_column($_SESSION['shop_car'], 'id');

        if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $_SESSION['shop_car'][$cont] = array
            (
        'id' =>filter_input(INPUT_GET,  'id'),
          'nome' =>filter_input(INPUT_POST,  'nome'),
         'valor' =>filter_input(INPUT_POST,  'valor'),
         'quantidade' =>filter_input(INPUT_POST,  'quantidade')
      );  
    }else{
        for ($i = 0; $i < count($product_ids); $i++){
          if($product_ids[$i] == filter_input(INPUT_GET, 'id')){

            $_SESSION['shop_car'][$i]['quantidade'] += filter_input(INPUT_POST, 'quantidade');
          }
        }
    }

        
    }else{
      $_SESSION['shop_car'][0] = array(
        'id' =>filter_input(INPUT_GET,  'id'),
          'nome' =>filter_input(INPUT_POST,  'nome'),
         'valor' =>filter_input(INPUT_POST,  'valor'),
         'quantidade' =>filter_input(INPUT_POST,  'quantidade')
      );
    }
}


if (filter_input(INPUT_GET, 'action') == 'delete'){

  foreach ($_SESSION['shop_car'] as $key => $produto) {

    if($produto['id'] == filter_input(INPUT_GET, 'id')){
      unset($_SESSION['shop_car'][$key]);
    }
  }
  $_SESSION['shop_car'] = array_values($_SESSION['shop_car']);

}
//pre_r($_SESSION);

function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

?>

<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="loja.css">
  <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <title>Curso Bootstrap 4</title>
  
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
          <a class="nav-link h5 mb-0" href="home.php"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link h5 mb-0 active" href="#"><i class="fas fa-shopping-bag"></i> Loja</a>
        </li>
        <li>
            <?php
             if(!isset($nome)):?>
          <a class="nav-link h5 mb-0" href="cadastro.php"><i class="fas fa-sign-out-alt"></i> Cadastro</a><?php
            endif;
            ?>
        </li>
 
            
       
   
          <li class="nav-item">
            <?php
          
          if(isset($nome)):?>
              <?php
      if(empty($_SESSION['shop_car'])):
      ?>
      <a class="nav-link h5 mb-0" href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho Vazio</a>
     
      <?php
      endif;
      ?>
              <?php
      if(!empty($_SESSION['shop_car'])):
      ?>
          <a class="nav-link h5 mb-0" href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a><?php
            endif;
            ?>
              <?php
            endif;
            ?>
          </li>
          <li>
             <?php
              if(isset($nome)):?>
          <a class="nav-link h5 mb-0" href="#"><i class="far fa-hand-spock"></i><?php echo " Olá $nome"?></a><?php
              endif;?>
              <?php
            if(!isset($nome)):?>
              <a class="nav-link h5 mb-0" href="login.php"><i class="far fa-hand-spock"></i> Login</a>
                <?php
                    endif;
              ?>
          </li>
          
        
               
    
      </ul>
      <form class="form-inline ml-auto">
            
        
        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Procurar</button>
         

<?php
          
          if(isset($nome)):?>
          <a class="nav-link h5 mb-0" href="logout.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Deslogar</a><?php
            endif;
            ?>
      </form>
    </div>

  </nav>

  <div class="container mt-0">
    <div class="row">
    <?php
include_once("conexao.php");

$query = 'SELECT * FROM produtos ORDER BY id ASC';

$result = mysqli_query($conexao,$query);

$row = mysqli_num_rows($result);



if($row > 0):
    while($produtos = mysqli_fetch_assoc($result)):
        
          ?>

          <div class="col-sm-4 col-md-3 mt-4" >
            <form method="post" action="loja.php?action=add&id=<?php
    echo $produtos['id']; ?>">
    <div class="produtos">
<div class="cartao">
    <img src="<?php echo $produtos['image'];?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-info"><?php  echo mb_convert_case($produtos['nome'], MB_CASE_TITLE, 'UTF-8');?></h5>
      
      <p class="card-text">R$ <?php echo $produtos['valor'];?></p>
      <input type="hidden" name="nome" value="<?php echo $produtos['nome'];?>">
      <input type="hidden" name="valor" value="<?php echo $produtos['valor'];?>">
      <input type="text" name="quantidade" class="form-control" value="1">
    </div>
    <input id="botao_carrinho" type="submit" name="add_to_cart" value="Adicionar ao carrinho">
    <div class="footer">
      <small class="textp">Postada á 2 min</small>
    </div>
  </div>
    </div>
  
  </form>

          </div>
        <?php
      endwhile;
endif;
    ?>
      </div>

      
      


     
    </div>
  </body>
</html>

