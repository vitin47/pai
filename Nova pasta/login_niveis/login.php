<?php
if ($gets[0] == "login")
{
	$user = isset ($_POST['login']) ? anti_injection ($_POST['login']) : NULL;
	$senha = isset ($_POST['senha']) ? md5 (anti_injection ($_POST['senha'])) : NULL;
	$reconhecer = isset ($_POST['reconhecer']) ? $_POST['reconhecer'] : "n";
	
	$Login = new Login;
	$Login->AutenticarUsuario ($user, $senha, $reconhecer);
}
?>