<?php
session_start();
include_once("conexao.php");

if(empty($_POST['email']) || empty($_POST['senha'])){
    header('location:login.php');
   
}




$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT nome from user_cad WHERE email = '{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);


$row = mysqli_num_rows($result);

if($row ==1){
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////AQUI SETA//////////////
       $_SESSION['nome'] = $nome;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////AQUI SETA//////////////
    header("Location:painel.php");
}else{
$_SESSION['invalido'] =  true;
header("Location:login.php");
}

echo $row;





?>