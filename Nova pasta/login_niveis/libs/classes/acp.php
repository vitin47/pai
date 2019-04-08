<?php
/*
   Classe Painel de Administração (ACP)
   
   Esta classe contém ações realizadas por meio do Painel de Administração
*/

class ACP
{
	/*
	   Função ExcluirInativos
	   Esta função exclui os usuários cujas contas não foram ativadas há mais de X dias, onde X é um número inteiro passado no argumento da função
	*/
	public function ExcluirInativos ($dias)
	{
		if ($dias == NULL || $dias == '')
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um número de dias');
			location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
			</script>
			";
			return false;
		}
		if ($dias == 0)
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um número inteiro e diferente de zero');
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
			$msgUm = "Foi excluído um registro.";
			$msgMais = "Foram excluídos ".$excluidos." registros.";
						
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
		    alert ('Não há contas inativas há mais de ".$dias." dias\\nNenhum registro foi excluído.');
		    location.href = '".SYS_ROOT_DIR."/acp/del_inativos';
		    </script>
		    ";
		    return true;
		}
		
	
	}
}

?>