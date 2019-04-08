<?php
session_start();
if(isset($_SESSION['nome'])){
$nome = $_SESSION['nome'];}

?>
<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/compiler/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Oswald" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>


  <title>Nilton Orquídeas</title>
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
      

  <div class="carouselSite">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="4000">
          <img src="img/SDA.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Bem vindo!!</h5>
            <p>Aprenda a cultivar suas orquídeas</p>
          </div>
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="img/SSDA.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        <div class="carousel-item" data-interval="4000">
          <img src="img/1231.jpg" class="d-block w-100" alt="...">
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

 <div class="container-fluid">
     <div class="row">
     <div class="col-md-3" style="background-color:#626262;">
       <div class="col-xm-12 col-lg-10 ">   
					        <?php
								include_once("conexao.php");

								$query = 'SELECT * FROM produtos WHERE id_categoria = 1 ORDER BY RAND() DESC LIMIT 2 ';

								$result = mysqli_query($conexao,$query);

								$row = mysqli_num_rows($result);
								if($row > 0):
							    while($produtos = mysqli_fetch_assoc($result)):
						        
						          ?>

						          
                                  <div id="tudo_prod"  class="col-sm-6 col-md-12">
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
                                                </div>
                                            </div>
                                              <h5 class="card-title text-info"href="loja.php"><?php  echo mb_convert_case($produtos['nome'], MB_CASE_TITLE, 'UTF-8');?></h5>
                                              <p class="card-text">R$ <?php echo $produtos['valor'];?></p>
                                              <input type="hidden" name="nome"  value="<?php echo $produtos['nome'];?>">
                                              <input type="hidden" name="valor" value="<?php echo $produtos['valor'];?>">
                                                 <div  style="background-color:blue; width:50%; margin-left:25%;border-radius:10px;">
                                                    <a href="loja.php"><p  style="color:white"><i class="fas fa-shopping-cart"></i></p></a>
                                                </div>
                                              
   
                                            <div class="footer">

                                              <small class="textp">Postada dia <?php echo date("d/m", strtotime($produtos['insercao'])); ?></small>
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
     <div class="col-md-6 mt-0" style="background-color: #9f9f9f;">
         
         <img src="img/weqwewwq.jpg" style="float:left; width:50%;margin-right:10px;border-radius:10px;margin-top: 10px;">
    <p style="margin-left:0px; padding:10px;font-size:20px;font-family: 'Lobster', cursive;">Antes de te contar como cuidar de orquídeas vou te contar uma história. As orquídeas são todas as plantas que fazem parte da família Orchidaceae, pertencente à ordem de Asparagales, uma das maiores famílias de plantas. Representam muitas formas, cores e tamanhos diferentes e existem em todos os continentes, exceto a Antártida, que prevalece nos trópicos. Em geral, epífitas, orquídeas crescem em árvores, usando-as apenas como suporte para a busca de luz; eles não são plantas parasitas, alimentados apenas pela decomposição do material, que cai de árvores e se acumula quando se enredam nas raízes. Existem muitas formas de reprodução.Na natureza, principalmente pela dispersão de sementes, mas no processo de cultivo por arbustos, culturas in vitro ou meristemas. Existem mais de 700 gêneros de orquídeas e  250.000 híbridas (cruzamento ). É flor!!!
					Apesar da grande variedade de espécies, pouco uso foi identificado para a orquídea, além do uso decorativo. Entre as poucas aplicações, a única generalizada é a produção de baunilha dos frutos de algumas espécies do gênero Vanilla, mas isso é limitado a produzir um composto artificial com muito menos custo. Ainda sim mesmo para a decoração, apenas uma pequena parte da espécie é usada, pois é que a grande maioria tem flores pequenas e folhagem pouco atraente. Por outro lado, de espécies espetaculares, os produtores de orquídeas recebem milhares de híbridos diferentes com grande efeito e atrativo comercial.</p></div>
     <div style="background-color:#626262;" class="col-md-3">

          <div class="col-xm-12 col-lg-10" style="margin-left:0%;">   
            
            <div >
              
					        <?php
								include_once("conexao.php");

								$query = 'SELECT * FROM produtos WHERE id_categoria = 3 ORDER BY RAND() DESC LIMIT 2 ';

								$result = mysqli_query($conexao,$query);

								$row = mysqli_num_rows($result);
								if($row > 0):
							    while($produtos = mysqli_fetch_assoc($result)):
						        
						          ?>

						            
                                  <div id="tudo_prod" class="col-sm-6 col-md-12">
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
                                                </div>
                                            </div>
                                              <h5 class="card-title text-info"><?php  echo mb_convert_case($produtos['nome'], MB_CASE_TITLE, 'UTF-8');?></h5>
                                              <p class="card-text">R$ <?php echo $produtos['valor'];?></p>
                                              <input type="hidden" name="nome" value="<?php echo $produtos['nome'];?>">
                                              <input type="hidden" name="valor" value="<?php echo $produtos['valor'];?>">
                                                <div  style="background-color:blue; width:50%; margin-left:25%;border-radius:10px;">
                                                    <a href="loja.php"><p  style="color:white"><i class="fas fa-shopping-cart"></i></p></a>
                                                </div>
                                              
   
                                            <div class="footer">
                                              <small class="textp">Postada dia <?php echo date("d/m", strtotime($produtos['insercao'])); ?></small>
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
     </div>
     </div>
         </div>

    

                  
         


  
		        <div class="mt-0"> 
                    <div id="conteudo_texto">
		        	<div style="border-radius:10px;" class="video embed-responsive embed-responsive-21by9 col-lg-6">
		        	
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4gY2YmgFTG4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		        	</div>

		              <h1 class="mt-0" style="text-align:center; color:#dedede;text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.47)">Adubação</h1>
		        	<p style="font-family: 'Lobster', cursive;">Antes de te contar como cuidar de orquídeas vou te contar uma história. As orquídeas são todas as plantas que fazem parte da família Orchidaceae, pertencente à ordem de Asparagales, uma das maiores famílias de plantas. Representam muitas formas, cores e tamanhos diferentes e existem em todos os continentes, exceto a Antártida, que prevalece nos trópicos. Em geral, epífitas, orquídeas crescem em árvores, usando-as apenas como suporte para a busca de luz; eles não são plantas parasitas, alimentados apenas pela decomposição do material, que cai de árvores e se acumula quando se enredam nas raízes. Existem muitas formas de reprodução.Na natureza, principalmente pela dispersão de sementes, mas no processo de cultivo por arbustos, culturas in vitro ou meristemas. Existem mais de 700 gêneros de orquídeas e  250.000 híbridas (cruzamento ). É flor!!!
					Apesar da grande variedade de espécies, pouco uso foi identificado para a orquídea, além do uso decorativo. Entre as poucas aplicações, a única generalizada é a produção de baunilha dos frutos de algumas espécies do gênero Vanilla, mas isso é limitado a produzir um composto artificial com muito menos custo. Ainda sim mesmo para a decoração, apenas uma pequena parte da espécie é usada, pois é que a grande maioria tem flores pequenas e folhagem pouco atraente. Por outro lado, de espécies espetaculares, os produtores de orquídeas recebem milhares de híbridos diferentes com grande efeito e atrativo comercial.</p>


		        </div>
                    </div>



 
                    <div id="conteudo_texto">
		        	<div style="border-radius:10px;" class="video2 embed-responsive embed-responsive-21by9 col-lg-6">
		        	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UZzQBQOQ-OQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		        	</div>

		              <h1 class="mt-2" style="text-align:center;color:#e1ede1;text-shadow: 4px 4px 0px rgba(0, 0, 0, 0.47)">Plantação</h1>
		        	<p style="font-family: 'Lobster', cursive;">Como jóias raras lapidadas pela natureza, as orquídeas foram por muitos anos privilégio dos mais abastados. A negociação por exemplares podia alcançar grandes somas. Colecionadores mais antigos contam que, décadas atrás, havia quem desse um carro em troca de alguma matriz exclusiva.

Talvez pelo fato de ocupar lugar de destaque no estilo de vida inglês - povo que tem a jardinagem e o cultivo em estufas entre seus hobbies prediletos -, foi na Inglaterra que o interesse por essa planta tropical ganhou impulso. Do Reino Unido, o cultivo de orquídeas se disseminou pelo mundo. Por aqui, lugar com temperatura adequada para o desenvolvimento da flor, quem tinha condições contratava profissionais com bom faro para descobrir novas e belas espécies.


Em anos mais recentes, as orquídeas se popularizaram. Pesquisas sobre o manejo de espécies e sobre hibridação baratearam e ampliaram as possibilidades de plantio, abrindo também espaço para atender a uma procura crescente pelos exemplares. </p>


		        </div>




    <div class="linha1"></div>
    <div class="teste22">
<div class="tudo_linha">
            <div class="row "> 
                <div class="col-xs-12 col-md-12">
                    <p id="pagamento">Formas de pagamento:</p>
                    <div class="bandeiras">
                        <img src="img/pagseguro-lightbox.png">
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