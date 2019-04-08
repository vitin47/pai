<?php
session_start();
include_once("conexao.php");


$id = mysqli_real_escape_string($conexao, $_POST['id']);
$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$valor = mysqli_real_escape_string($conexao, $_POST['valor']);
$imagem = mysqli_real_escape_string($conexao, $_POST['imagem']);
$categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
$descricao = mysqli_real_escape_string($conexao,$_POST['descricao']);

echo $nome;
echo "<br>";
echo $id;
echo "<br>";
echo $valor;
echo "<br>";
echo $imagem;
echo "<br>";
echo $categoria;
echo "<br>";
echo $descricao;



$query = "UPDATE produtos SET nome = '$nome', valor = '$valor', image = '$imagem', descricao = '$descricao', id_categoria = '$categoria' WHERE `produtos`.`id_produto` = '$id'";




$result = mysqli_query($conexao,$query);

?>