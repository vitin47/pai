<?php
/*
   Painel de Administração (acp)
*/
if ($_SESSION['login']['nivel'] != 1)
{
	header ("Location: ".SYS_ROOT_DIR);
	exit;
}


if ($gets[0] == "acp")
{
	echo "<p>Bem-vindo(a) ao Painel de Administração, <strong>" . $_SESSION['login']['user'] . "</strong>.</p>";
	echo "
	<p>
	<a href=\"".SYS_ROOT_DIR."/acp/del_inativos\">Excluir usuários inativo</a>
	</p>
	";
		
	if ($gets[1] == "del_inativos")
    {
	    if ($_SERVER['REQUEST_METHOD'] != "POST")
	    {
		    echo "
	        <p>Você poderá excluir as contas inativas, cujos usuários não realizaram a ativação por meio do link enviado no e-mail. Para isso, especifique um número de dias mínimo de tolerância. Aconselha-se cinco.</p>
	        <form method=\"post\" action=\"".SYS_ROOT_DIR."/acp/del_inativos/\">
    	    Excluir usuários cujas contas não foram ativadas há mais de
	        <input type=\"text\" name=\"dias\" id=\"dias\" maxlength=\"2\" style=\"width: 20px;\" />
	        dias.<br /><br />
	        <input type=\"submit\" value=\"Executar limpeza\" />
	        </form>
    	    ";
    	}
    	else
    	{
			$dias = isset($_POST['dias']) ? (int)$_POST['dias'] : NULL;
			
			$ACP = new ACP;
			$ACP->ExcluirInativos ($dias);
		}
    }
	
	
}

?>