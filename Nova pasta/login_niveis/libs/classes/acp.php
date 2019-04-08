<?php
/*
   Classe Painel de Administra��o (ACP)
   
   Esta classe cont�m a��es realizadas por meio do Painel de Administra��o
*/

class ACP
{
	/*
	   Fun��o ExcluirInativos
	   Esta fun��o exclui os usu�rios cujas contas n�o foram ativadas h� mais de X dias, onde X � um n�mero inteiro passado no argumento da fun��o
	*/
	public function ExcluirInativos ($dias)
	{
		if ($dias == NULL || $dias == '')
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um n�mero de dias');
			location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
			</script>
			";
			return false;
		}
		if ($dias == 0)
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um n�mero inteiro e diferente de zero');
			location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
			</script>
			";
			return false;
		}
		
		
		$My = new MySQLiConnection;
		$sql = $My->query ("DELETE FROM usuarios WHERE ativado = 'n' AND data_cadastro < (SUBDATE( NOW( ) , ".$dias." ))") or die ($My->error);
		$excluidos = $My->affected_rows;
		
		if ($excluidos > 0)
		{
			$msgUm = "Foi exclu�do um registro.";
			$msgMais = "Foram exclu�dos ".$excluidos." registros.";
						
			echo "
		    <script type=\"text/javascript\">
		    alert ('Limpeza realizada com sucesso!\\n".(($excluidos == 1) ? $msgUm : $msgMais)."');
		    location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
	    	</script>
		    ";
		    return true;
		}
		else
		{
			echo "
		    <script type=\"text/javascript\">
		    alert ('N�o h� contas inativas h� mais de ".$dias." dias\\nNenhum registro foi exclu�do.');
		    location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
		    </script>
		    ";
		    return true;
		}
		
	
	}
}

?>