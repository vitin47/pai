<?php
    
$base = pathinfo($_SERVER['PHP_SELF']);
$base = $base['basename'];
$self = pathinfo(__FILE__);
$self = $self['basename'];

if ($self == $base)
    die('Este arquivo não pode ser acessado diretamente.');

    
if (!(version_compare(phpversion(), "4.3.0", ">=")))
   die("O sistema precisa de PHP versão 4.3.0 ou superior.");
    

$prefix = (PHP_SHLIB_SUFFIX == 'dll') ? 'php_' : '';
if (!extension_loaded('mysql'))
{
     if (function_exists('dl'))
	 {
         
		 if (!dl($prefix . 'mysql.' . PHP_SHLIB_SUFFIX))
             die("Não foi possível carregar a extensão MySQL.");
         
    }
}

if (!extension_loaded('mysqli'))
{
     if (function_exists('dl'))
	 {
         if (!dl($prefix . 'mysqli.' . PHP_SHLIB_SUFFIX))
             die("Não foi possível carregar a extensão MySQLi.");
         
    }
}

if (!extension_loaded('gd'))
{
     if (function_exists('dl'))
	 {
         if (!dl($prefix . 'gd2.' . PHP_SHLIB_SUFFIX))
             die("Não foi possível carregar a extensão GD.");
         
    }
}


if (!(defined('BARRA')))
	    define('BARRA', DIRECTORY_SEPARATOR);   
    
if(function_exists('ini_set'))
{
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', '1');
    ini_set('short_open_tag', '0');
}
    
@set_magic_quotes_runtime(FALSE);
    
$constantes = array("SMTP_SERVIDOR" => "smtp.mail.yahoo.com.br", "SMTP_USUARIO" => "rbchaiben", "SMTP_SENHA" => "asxz123", "DB_SERVIDOR" => "localhost", "DB_USUARIO" => "root", "DB_SENHA" => "asxz123", "DB_NOME" => "login_niveis",  "IMAGENS_PATH" => "img" . BARRA, "CSS_PATH" => "css" . BARRA, "CSS_ARQ" => "default.css", "JS_PATH" => "js" . BARRA, "JS_ARQ" => "default.js", "FUNCOES_PATH" => "libs" . BARRA, "FUNCOES_ARQ" => "funcoes.php", "CLASSES_PATH" => "libs" . BARRA, "CLASSES_ARQ" => "classes.php", "LOGS_PATH" => "logs"  . BARRA);
   
$nome_const = array_keys($constantes);
$valor_const = array_values($constantes);
 
for($i = 0; $i < count($nome_const); $i++)
{
    if (!(defined($nome_const[$i])))
        define($nome_const[$i], $valor_const[$i]);
}
    
if (get_magic_quotes_gpc())
{
    $_SERVER  = stripslashes_array($_SERVER);
    $_GET     = stripslashes_array($_GET);
    $_POST    = stripslashes_array($_POST);
    $_COOKIE  = stripslashes_array($_COOKIE);
    $_FILES   = stripslashes_array($_FILES);
    $_ENV     = stripslashes_array($_ENV);
    $_REQUEST = stripslashes_array($_REQUEST);
    
	if (isset($_SESSION)) 
        $_SESSION = stripslashes_array($_SESSION, '');      
}


function stripslashes_array($data)
{
    if (is_array($data))
	{
        foreach ($data as $key => $value)
		    $data[$key] = stripslashes_array($value);
            
		return $data;
    }
	else
        return stripslashes($data);
}



$caminho = (FUNCOES_PATH == '') ? FUNCOES_ARQ : FUNCOES_PATH . FUNCOES_ARQ;
if (file_exists($caminho))
    require_once($caminho);
else
    die("Não foi possível encontrar o arquivo de funções.");

$caminho = (CLASSES_PATH == '') ? CLASSES_ARQ : CLASSES_PATH . CLASSES_ARQ;
if (file_exists($caminho))
    require_once($caminho);
else
    die("Não foi possível encontrar o arquivo de classes.");
  


if (ini_get('register_globals'))
{
    foreach($GLOBALS as $s_variable_name => $m_variable_value)
	{
        if (!in_array($s_variable_name, array('GLOBALS', 'argv', 'argc', '_FILES', '_COOKIE', '_POST', '_GET', '_SERVER', '_ENV', '_SESSION', 's_variable_name', 'm_variable_value')))
            unset($GLOBALS[$s_variable_name]);
            
    }
    unset($GLOBALS['s_variable_name']);
    unset($GLOBALS['m_variable_value']);
}
?>