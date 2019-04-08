<?php
/*
   Painel de Administra��o (acp)
*/
if ($_SESSION['login']['nivel'] != 1)
{
	header ("Location: ".SYS_ROOT_DIR);
	exit;
}


if ($gets[0] == "acp")
{
	echo "<p>Bem-vindo(a) ao Painel de Administra��o, <strong>" . $_SESSION['login']['user'] . "</strong>.</p>";
	echo "
	<p>
	<a href=\"".SYS_ROOT_DIR."/acp/del_inativos\">Excluir usu�rios inativo</a>
	</p>
	";
		
	if ($gets[1] == "del_inativos")
    {
	    if ($_SERVER['REQUEST_METHOD'] != "POST")
	    {
		    echo "
	        <p>Voc� poder� excluir as contas inativas, cujos usu�rios n�o realizaram a ativa��o por meio do link enviado no e-mail. Para isso, especifique um n�mero de dias m�nimo de toler�ncia. Aconselha-se cinco.</p>
	        <form method=\"post\" action=\"".SYS_ROOT_DIR."/acp/del_inativos/\">
    	    Excluir usu�rios cujas contas n�o foram ativadas h� mais de
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