<?php
session_start();
include_once("conexao.php");

if(empty($_POST['email']) || empty($_POST['senha'])){
    header('location:login.php');
   
}




$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT nome,adm from user_cad WHERE email = '{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_assoc($result);


$row = mysqli_num_rows($result);


if($row ==1){

	
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////AQUI SETA//////////////
       $_SESSION['email'] = $email;
       $_SESSION['nome'] = $nome;
       $_SESSION['id_usuario'] = $resultado['adm'];
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////AQUI SETA//////////////
      if ($_SESSION['id_usuario'] == 1){
      	header("Location:index.php");
      }else{
      	header("Location:index.php");
      }
       
}else{
$_SESSION['invalido'] =  true;
header("Location:login.php");
}







?>