<?php
/*
   Classe para realizar ações do Painel de Controle (ucp)
*/

class UCP
{
	public function AlterarSenha ($id_user, $senha_atual, $nova_senha1, $nova_senha2)
	{
		if ($senha_atual == NULL || $nova_senha1 == NULL || $nova_senha2 == NULL)
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Todos os campos são obrigatórios.');
			location.href = '".SYS_ROOT_DIR."/ucp/alt_senha';
			</script>
			";
			return false;
		}
		if ($nova_senha1 != $nova_senha2)
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Você digitou duas novas senhas diferentes.');
			location.href = '".SYS_ROOT_DIR."/ucp/alt_senha';
			</script>
			";
			return false;
		}
		
		$My = new MySQLiConnection;
		$sql1 = $My->query ("Select senha From usuarios Where id = ".$id_user);
		$f = $sql1->fetch_object();
		if ($f->senha != md5($senha_atual))
		{
			echo "
			<script type=\"text/javascript\">
			alert ('A senha atual digitada não coincide com a cadastrada em nosso sistema.');
			location.href = '".SYS_ROOT_DIR."/ucp/alt_senha';
			</script>
			";
			return false;
		}
	    
		$sql2 = $My->query ("Update usuarios Set senha = '".md5($nova_senha1)."' Where id = ".$id_user);
		if ($sql2)
		{
			if ($My->affected_rows == 1)
			{
				$_SESSION['login']['senha'] = md5($nova_senha1);
				echo "
			    <script type=\"text/javascript\">
			    alert ('Senha alterada com sucesso.');
			    location.href = '".SYS_ROOT_DIR."/ucp';
			    </script>
			    ";
				return true;
			}
		}
	}
	
	
}
?>