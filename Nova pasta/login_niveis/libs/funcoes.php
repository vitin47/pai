<?php

/*
** Arquivo que inclui todas as fun��es do diret�rio "funcoes/"
*/

//este script � inclu�do na index, por isso deve-se adicionar "libs/" � defini��o do diret�rio
$dir = "libs" . BARRA . "funcoes" . BARRA;

$open = opendir ($dir);
while (($file = readdir ($open)) !== false)
{
	if ($file == "." || $file == "..")
	    continue;
	require_once $dir . $file;
}
closedir ($open);
?>