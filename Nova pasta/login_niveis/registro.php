<?php

if ($gets[0] == "registro" AND $_SERVER['REQUEST_METHOD'] != "POST")
{
    echo "
    <p>O cadastro requer validação por e-mail, portanto certifique-se de que seu e-mail esteja             correto, para que seu registro possa ser realizado.</p>
    <p>Após o cadastro, será enviada ao seu e-mail uma mensagem contendo um link destinado à ativação de sua conta.</p>

    <form name=\"registro\" id=\"registro\" method=\"post\" action=\"".SYS_ROOT_DIR."/registro\">
    <label for=\"re_nome\">Nome: </label>
    <input type=\"text\" name=\"re_nome\" id=\"re_nome\" value=\"".((isset ($_SESSION['registro']['nome'])) ? $_SESSION['registro']['nome'] : "")."\" maxlenght=\"120\" />
    <br /><br />
    <label for=\"re_email\">E-Mail: </label>
    <input type=\"text\" name=\"re_email\" id=\"re_email\" value=\"".((isset ($_SESSION['registro']['email'])) ? $_SESSION['registro']['email'] : "")."\" maxlenght=\"120\" />
    <br /><br />
	<label for=\"re_login\"><em>Login</em>: </label>
    <input type=\"text\" name=\"re_login\" id=\"re_login\" value=\"".((isset ($_SESSION['registro']['login'])) ? $_SESSION['registro']['login'] : "")."\" maxlenght=\"30\" />
    <br /><br />
    <label for=\"re_senha1\">Senha: </label>
    <input type=\"password\" name=\"re_senha1\" id=\"re_senha1\" maxlenght=\"15\" />
    <br /><br />
    <label for=\"re_senha2\">Senha (verificação): </label>
    <input type=\"password\" name=\"re_senha2\" id=\"re_senha2\" maxlenght=\"15\" />
    <br /><br /><br />
    <input type=\"submit\" value=\"Cadastrar\" />
    </form>
    ";
}

if ($gets[0] == "registro" AND $_SERVER['REQUEST_METHOD'] == "POST")
{
	$nome = $_SESSION['registro']['nome'] = isset ($_POST['re_nome']) ? anti_injection ($_POST['re_nome']) : NULL;
	$email = $_SESSION['registro']['email'] = isset ($_POST['re_email']) ? anti_injection ($_POST['re_email']) : NULL;
	$login = $_SESSION['registro']['login'] = isset ($_POST['re_login']) ? anti_injection ($_POST['re_login']) : NULL;
	$senha1 = $_SESSION['registro']['senha1'] = isset ($_POST['re_senha1']) ? anti_injection ($_POST['re_senha1']) : NULL;
	$senha2 = $_SESSION['registro']['senha2'] = isset ($_POST['re_senha2']) ? anti_injection ($_POST['re_senha2']) : NULL;
	
	$Login = new Login;
	$Login->RegistrarUsuario ($nome, $email, $login, $senha1, $senha2);
}

?>