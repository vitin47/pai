<?php
session_start();
 if(isset($_SESSION['nome'])){
$nome = $_SESSION['nome'];
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
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>


  <title>Curso Bootstrap 4</title>
  
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
        if(isset($nome)):
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

<div class="container">
<div class="tabela mt-2">
    <table class="table  mt-3" style="border-radius:10px;background-color:#e5e5e5;">
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
