<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$query = "DELETE FROM `produtos` WHERE `produtos`.`id_produto` = '$id'";

$result = mysqli_query($conexao,$query);

?>