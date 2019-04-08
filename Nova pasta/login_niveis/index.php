<?php
require "init.php";
session_start();

if (isset ($_COOKIE["login"]))
    $_SESSION['login'] = unserialize ($_COOKIE["login"]);

define ("SYS_ROOT_DIR", "http://localhost/scripts/login_niveis");
$gets = explode("/",str_replace(strrchr($_SERVER['REQUEST_URI'], "?"), "", $_SERVER['REQUEST_URI']));
array_shift($gets);
array_shift($gets);
array_shift($gets);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="<?php echo SYS_ROOT_DIR; ?>/css/default.css" />

<script type="text/javascript" src="<?php echo SYS_ROOT_DIR; ?>/js/default.js"></script>

<title>Sistema de Login</title>
</head>
<body>
<div id="topo">
<h1 style="text-align: center;">Sistema de <em>Login</em> com Níveis de Acesso</h1>
<p style="text-align: center;">Desenvolvido por: <strong>Roberto Beraldo Chaiben (Beraldo)</strong></p>
</div>

<div id="menu">
<?php
if (isset($_SESSION['login']['auth']))
{
	if ($_SESSION['login']['auth'] == md5(1))
	{
		echo "
		<ul>
		  <li style=\"font-size: 14px;\">Olá, <strong>{$_SESSION['login']['user']}</strong>.</li>
		  <li><a href=\"".SYS_ROOT_DIR."/ucp\">Painel de Controle</a></li>
		";
		if ($_SESSION['login']['nivel'] == 1)
		    echo "<li><a href=\"".SYS_ROOT_DIR."/acp\">Painel de Administração</a></li>
			";
		echo "
		<li><a href=\"".SYS_ROOT_DIR."/sair\">Sair</a></li>
		</ul>
		";
	}
	else
	{
		echo "Este menu foi desativado.";
	}
}
else
{
	echo "
	<ul>
	  <li><a href=\"javascript:void(0)\" onclick=\"DivLogin();\">Entrar</a></li>
	  <li><a href=\"".SYS_ROOT_DIR."/registro\">Registre-se</a></li>
	</ul>
	";
}

?>
</div>
<div id="divLogin" style="visibility: hidden;">
<span class="btFechar"><a href="javascript:DivLogin()" title="Fechar">[X]</a></span>
<form name="form_login" id="form_login" method="post" action="<?php echo SYS_ROOT_DIR; ?>/login">
<ul>
  <li>
	<label for="login"><em>Login</em>: </label>
	<input type="text" name="login" id="login" style="width: 120px; height: 16px;" />
  </li>
  <li>
    <label for="senha">Senha: </label>
	<input type="password" name="senha" id="senha" style="width: 100px; height: 16px;" />
  </li>
  <li>
  <input type="checkbox" name="reconhecer" id="reconhecer" value="s" style="cursor: pointer;" />
  <label for="reconhecer" style="cursor: pointer;">Reconhecer-me automaticamente</label>
  </li>
  <li>
    <input type="submit" value="Entrar" />
  </li>
</ul>
</form>
</div>

<div id="conteudo">

<?php
$gets[0] = isset ($gets[0]) ? $gets[0] : NULL;
$gets[1] = isset ($gets[1]) ? $gets[1] : NULL;
$gets[2] = isset ($gets[2]) ? $gets[2] : NULL;

if(file_exists($gets[0] . ".php"))
{
    require $gets[0] . ".php";
}
else
{
    require "inicial.php";
}
?>
</div>
</body>
</html>