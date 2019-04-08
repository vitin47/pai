<?php
/*
   Painel de Controle dos Usuários (ucp)
*/
if ($gets[0] == "ucp")
{
	echo "<p>Bem-vindo(a) ao seu Painel de Controle, <strong>" . $_SESSION['login']['user'] . "</strong>.</p>";
	echo "
	<p>
	<a href=\"".SYS_ROOT_DIR."/ucp/alt_senha\">Alterar senha</a>
	</p>
	";
	
	if ($gets[1] == "alt_senha")
	{
		if ($_SERVER['REQUEST_METHOD'] != "POST")
		{
			echo "
			<p>Para alterar sua senha, preencha o formulário abaixo.</p>
			<form method=\"post\" action=\"".SYS_ROOT_DIR."/ucp/alt_senha\">
			<label for=\"senha_atual\">Senha <strong>atual</strong>: </label>
			<br />
			<input type=\"password\" name=\"senha_atual\" id=\"senha_atual\" />
			<br /><br />
			<label for=\"senha1\">Nova senha: </label>
			<br />
			<input type=\"password\" name=\"senha1\" id=\"senha1\" />
			<br /><br />
			<label for=\"senha2\">Confirme a nova senha: </label>
			<br />
			<input type=\"password\" name=\"senha2\" id=\"senha2\" />
			<br /><br /><br />
			<input type=\"submit\" value=\"Alterar\" />
			</form>
			";
		}
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$senha_atual = isset($_POST['senha_atual']) ? $_POST['senha_atual'] : NULL;
			$senha1 = isset($_POST['senha1']) ? anti_injection($_POST['senha1']) : NULL;
			$senha2 = isset($_POST['senha2']) ? anti_injection($_POST['senha2']) : NULL;
			
			$UCP = new UCP;
			$UCP->AlterarSenha ($_SESSION['login']['id_usuario'], $senha_atual, $senha1, $senha2);
			
		}
				
		
	}
	
	
}
?>