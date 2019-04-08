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
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  <title>Curso Bootstrap 4</title>
  <script src="node_modules/jquery/dist/jquery.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>

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


  <?php
  if(!isset($nome)):?>
    
  <div class="container mt-2">
  	<div class="alert" style="background-color: rgb(222, 75, 75);" role="alert">
  Para efetuar sua compra é necessário estar logado <a href="login.php" class="alert-link" style="color: white;">Faça seu login</a>.
</div>
</div>
<?php endif;?>
 <div class="container-fluid">
			<div class="row">
			     <div class="col-md-3">
                    <div class="menu col-md-12">
                      <ul>
                        <li><a href="loja.php">Orquídeas</a></li>
                        <li><a href="loja_manutencao.php">Manutenção</a></li>
                        <li><a href="loja_cultivo.php">Cultivo</a></li>
                      </ul>
                    </div>
             </div>
						<div class="col-xm-12 col-md-6 ">
			             <div class="row">
			        
					        <?php
								include_once("conexao.php");

								$query = 'SELECT * FROM produtos WHERE id_categoria = 2 ORDER BY id_produto ASC ';

								$result = mysqli_query($conexao,$query);

								$row = mysqli_num_rows($result);
								if($row > 0):
							    while($produtos = mysqli_fetch_assoc($result)):
						        
						          ?>

						          
                                  <div id="tudo_prod" class="col-sm-4 col-md-4">
						            <form method="post" action="loja.php?action=add&id=<?php
						              echo $produtos['id_produto']; ?>">         
						    <div class="produtos">
                                        <div class="row" >
                                            <div class="cartao">
                                            <div class="carouselSite">
                                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                                  <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                                  </ol>
                                                  <div class="carousel-inner">
                                                    <div class="carousel-item active" data-interval="4000">
                                                      <img src="<?php echo $produtos['image']?>" class="d-block w-100" alt="...">
                                                      <div class="carousel-caption d-none d-md-block">
                                                      </div>
                                                    </div>
                                                    <div class="carousel-item" data-interval="4000">
                                                      <img src="<?php echo $produtos['image']?>" class="d-block w-100" alt="...">
                                                      <div class="carousel-caption d-none d-md-block">
                                                      </div>
                                                    </div>
                                                    <div class="carousel-item" data-interval="4000">
                                                      <img src="<?php echo $produtos['image']?>" class="d-block w-100" alt="...">
                                                      <div class="carousel-caption d-none d-md-block">

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
                                              <h5 class="card-title text-info"><?php  echo mb_convert_case($produtos['nome'], MB_CASE_TITLE, 'UTF-8');?></h5>
                                              <p class="card-text">R$ <?php echo $produtos['valor'];?></p>
                                              <input type="hidden" name="nome" value="<?php echo $produtos['nome'];?>">
                                              <input type="hidden" name="valor" value="<?php echo $produtos['valor'];?>">
                                              <input id="quantidade" type="text" name="quantidade" class="form-control" value="1">
                                              
                                                
                                                
                                             <button style="margin-left: 35%;" type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModalScrollable<?php echo $produtos['id_produto']?>">
                                                <i class="fas fa-info-circle"></i> Detralhes:
                                              </button>

                                              <!-- Modal -->
                                              <div  class="modal fade" id="exampleModalScrollable<?php echo $produtos['id_produto']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                  <div class="modal-content">
                                                    <div  class="modal-header">

                                                      <h5 style="color: black; text-align: center;" class="modal-title " id="exampleModalScrollableTitle" ><?php  echo mb_convert_case($produtos['nome'], MB_CASE_TITLE, 'UTF-8');?></h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <img src="<?php echo $produtos['image']?>" class="d-block w-100" alt="...">
                                                      <h3>Descrição:</h3>
                                                      <p><?php echo $produtos['descricao']?></p>
                                                      <hr>
                                                      <p>Orquidea de aproximadamente 30cm de autura.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-success" data-dismiss="modal">Pronto!</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                            <?php if(!isset($nome)):?>
                                            <input id="botao_carrinho" style="background-color:rgba(46, 172, 209, 0.73); cursor:wait;" disabled type="submit" name="add_to_cart" value="Adicionar ao carrinho">
                                            <?php endif?>
                                               
                                            <?php if(isset($nome)):?>
                                             <input id="botao_carrinho" type="submit" name="add_to_cart" value="Adicionar ao carrinho">
                                            <?php endif?>
                                                
                                            

                                                
                                                
                                                
                                            <div class="footer">
                                              <small class="textp">Postada á 2 min</small>
                                            </div>
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
			    <div class="col-md-3"></div>
        
            </div>
</div>
			
    
    
    <div class="linha"></div>
    <div class="teste22">
<div class="tudo_linha">
            <div class="row "> 
                <div class="col-md-6">
                    <p id="pagamento">Formas de pagamento:</p>
                    <div class="bandeiras">
                        <img src="img/ico-boleto.png">
                        <img src="img/Cart%C3%A3o_Elo_.png">
                       <img src="img/bandeira-visa-png.png">
                        <img src="img/Mastercard-PNG-Clipart.png">
                 </div>
                </div>
                <div class="col-md-6">
                    <div class="logo">
                    <img id="logo_imagem" src="img/google-safe.png">
                    </div>
                </div>
            </div>
</div>
    </div>
        <div class="linha"></div>
         <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Localização</h4>
                <hr class="my-4">
                <div class="small text-black-50">Vale do Sol - Nova lima<br>(Agendar visita antes)</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <p href="#">Niltonorquidea@yahoo.com.br</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Telefone</h4>
                <hr class="my-4">
                <div class="small text-black-50">(31) 99714-8987</div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">

          <a href="https://www.instagram.com/niltonorquideas/" class="mx-2">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://api.whatsapp.com/send?phone=5531997148987&text=Ol%C3%A1%20Nilton%2C%20vim%20atrav%C3%A9s%20do%20seu%20site." class="mx-2">
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Direitos reservados 2019
      </div>
    </footer>
			     
        
            
            
            

    
    


  </body>
</html>

