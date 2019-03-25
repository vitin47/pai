<?php

define('host', 'localhost');
define('usuario','root');
define('senha', '');
define('db','site');


$conexao =mysqli_connect(host,usuario,senha,db) or die('Não conectou');


?>