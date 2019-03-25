<?php
session_start();
 if(isset($_SESSION['nome'])){
$nome =$_SESSION['nome'];
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
          <a class="nav-link h5 mb-0" href="loja.php"><i class="fas fa-shopping-bag"></i> Loja</a>
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
      <a class="nav-link h5 mb-0 active" href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho Vazio</a>
     
      <?php
      endif;
      ?>
              <?php
      if(!empty($_SESSION['shop_car'])):
      ?>
          <a class="nav-link h5 mb-0 active" href="carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a><?php
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



<div class="container">
<div class="tabela mt-2">
    <table class="table table-dark  mt-3">
  <thead>
    <tr>
      <th scope="col">Nome do produto:</th>
      <th scope="col">Quantidade:</th>
      <th scope="col">Preço(R$):</th>
      <th scope="col">Valor dos produtos:</th>
      <th scope="col">Action:</th>

      <?php
        if(!empty($_SESSION['shop_car'])):

          $total = 0;
          foreach ($_SESSION['shop_car'] as $key => $produto):
            ?>

  </thead>
  <tbody>
      <td><?php echo mb_convert_case($produto['nome'], MB_CASE_TITLE, 'UTF-8')?></td>
      <td ><?php echo $produto['quantidade'];?></td>
      <td><?php echo $produto['valor'];?></td>
      <td><?php echo number_format($produto['quantidade'] * $produto['valor'],2);?></td>
       <td>
            <a href="loja.php?action=delete&id=<?php echo $produto['id'];?>">
              <div class="btn" style="background-color: green">Remover</div>
            </a>
       </td>
        
    
    <?php
        $total = $total + ($produto['quantidade'] * $produto['valor']);
        endforeach;
            ?>
            <tr>
              <td colspan="4" align="center">Total a pagar</td>
              <td colspan="1" align="">R$ <?php echo number_format($total,2);?></td>
            </tr>
            <div class="posicao">
            <tr>
              <td colspan="5">
                <?php
                  if (isset($_SESSION['shop_car'])):
                    if(count($_SESSION['shop_car']) > 0):
                ?>

                   <a href="compra.php" type="btn" class="btn btn-primary btn-lg btn-block">Confirmar</a>
                 <?php endif;endif;?>
              </td>

            </tr>
            </div>
                  </tbody>
                </table>
            </div>
            <?php
          endif;
        ?>
      
      
      
      <?php
      if(empty($_SESSION['shop_car'])):
      ?>
      
      <tbody>
          <tr>
           <td colspan="5" align="center"><a><i class="far fa-frown" style="font-size:30px;"></i></a><br><a>Você não possui nem um item no <i class="fas fa-shopping-cart"></i></a>
              
            </tr>
        </tbody>
      <?php
      endif;
      ?>
    </div>
