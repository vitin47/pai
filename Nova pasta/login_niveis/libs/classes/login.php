<?php
#############################################
#                                           #
# Autor: Roberto Beraldo Chaiben (Beraldo)  #
#      E-Mail: rbchaiben@gmail.com          #
#                                           #
#############################################

/*
   Classe para autentica��o de usu�rios segundo n�veis de acesso, sendo eles:
   
   1 -> Conta de Administradores
   2 -> Conta de Usu�rio Comuns
*/

class Login{
	
	/*
	   Fun��o RegistrarUsuario
	   Esta fun��o � utilizada para inserir um novo cadastro na tabela de usu�rios, al�m de chamar a fun��o EnviarAtiva��o(), a qual usa a classe PHPMailer para enviar a mensagem para ativa��o de registro no sistema.
	*/
	public function RegistrarUsuario ($nome, $email, $login, $senha1, $senha2)
	{
		$erro = array();
		if ($email == NULL || $email == '')
		    $erro[] = "Informe seu e-mail.";
		if (!ValidarEmail ($email))
		    $erro[] = "O e-mail informado � inv�lido.";
		if ($login == NULL || $login == '')
		    $erro[] = "Escolha um login (nome de usu�rio).";
		if (strlen ($login) > 30)
		    $erro[] = "O login n�o pode ter mais de 30 caracteres.";
		if ($senha1 == NULL || $senha1 == '')
		    $erro[] = "Digite uma senha.";
		if ($senha2 == NULL || $senha2 == '')
		    $erro[] = "Voc� n�o confirmou sua senha.";
		if ($senha1 != $senha2)
		    $erro[] = "Voc� digitou duas senhas diferentes.";
		
		if (count ($erro) > 0)// se ocorrer(em) erro(s)
		{
			$msg = "";
			foreach ($erro as $v)
			    $msg .= $v."\\n";
			echo "
			<script type=\"text/javascript\">
			alert ('".$msg."');
			location.href = '".SYS_ROOT_DIR."/registro';
			</script>
			";
			return false;
		}
		$senha = md5($senha1);
		$My = new MySQLiConnection();
		
		//nome da tabela na qual s�o inseridos os dados dos usu�rios
		$tb_name = "usuarios";
		$sql = @$My->query ("Insert Into ".$tb_name." Values (NULL, '".$nome."', '".$login."', '".$senha."', 2, NOW(), 'n')");
		if ($sql === true)
		{
		    if ($My->affected_rows == 1)
		    {
			    $id = $My->insert_id;
			    $send = $this->EnviarAtiva��o($nome, $login, $email, $senha1, $id);
			    if ($send === true)
			    {
			        echo "OK.";
			    	unset ($_SESSION['registro']);
			        return true;
			     }
			     else
			         echo $send;
		    }
		}
		elseif ($My->errno != 0)
		{
		 //a consulta falhou
			$error_code = $My->errno;
			if (function_exists ("Erro".$error_code))
			{//se houver a fun��o de erro personalizada
				switch ($error_code)
				{
					case 1051:
					  Erro1051 ($tb_name);
					  break;
					case 1062:
					  echo "<h3 style=\"color:red;\">O nome de usu�rio que voc� escoljeu j� existe.</h3>";
					  break;
					case 1146:
					  Erro1146 ($tb_name);
					  break;
					default:
					  call_user_func ("Erro".$error_code);
					  break;
				}
			}
			else
			{
				echo $My->error;
			}
		    echo "<p><a href=\"javascript:history.back()\">&lt;&lt; Voltar</a></p>";
		}
			
	}
	
	/*
	   Fun��o EnviarAtiva��o
	   Utiliza a classe PHPMailer para enviar, via SMTP, a mensagem para ativa��o do registro.
	*/
	private function EnviarAtiva��o($nome, $login, $email, $senha, $id)
	{
		//id codificado em base_64
		$id = base64_encode ($id);
		
		$Mail = new PHPMailer;
		$Mail->From = "email@sistemadelogin.com.br";// e-mail do sistema
		$Mail->FromName = "Sistema de Login";// nome do sistema
		$Mail->Subject = "Ativa��o de Cadastro";// assunto da mensagem
		$Mail->IsSMTP();
		$Mail->Host = SMTP_SERVIDOR;//servidor SMTP
		$Mail->SMTPAuth = true;
		$Mail->Username = SMTP_USUARIO;// Nome de usu�rio do SMTP
		$Mail->Password = SMTP_SENHA;// senha do SMTP
		$Mail->AddAddress ($email, $nome);
		$Mail->IsHTML(true);
	
		// mensagem HTML
		$Mail->Body = "
		<p>Voc&ecirc; se regsitrou em nosso sistema com os seguintes dados:</p>
		Nome de Usu&aacute;rio (<em>Login</em>): <strong>".$login."</strong>
		<br />
		Senha: <strong>".$senha."</strong>
		<br /><br />
		<p>Para ativar a sua conta, clique no link abaixo:</p>
		<p><a href=\"".SYS_ROOT_DIR."/registro/ativacao/".$id."\">".SYS_ROOT_DIR."/registro/ativacao/".$id."</a></p>
		Atenciosamente,<br />
		Sistema de Login
		";
		
		// mensagem texto
		$Mail->AltBody = "
		Voc� se regsitrou em nosso sistema com os seguintes dados:
		\n\n
		Nome de Usu�rio (Login): ".$login."
		\n
		Senha: ".$senha."
		\n\n\n
		Para ativar a sua conta, visite o endere�o abaixo:\n\n
		".SYS_ROOT_DIR."/registro/ativacao/".$id."
		\n\n\n
		Atenciosamente,\n
		Sistema de Login
		";
		
		if ($Mail->Send())
		  return true;
		else
		  return $Mail->ErrorInfo;
		
		
	}
	
	/*
	   Fun��o AutenticarUsuario
	   Destinada � autentica��o dos usu�rios (login) propriamente dita.
	   O primeiro par�metro � o nome de usu�rio (login), o segundo, a senha. O terceiro recebr� o valor "s", se o usu�rio selecionou "Reconhecer-me automaticamente"; caso contr�rio, receber� "n". O reconhecimento autom�tico � feito por meio de um cookie denominado "login".
	*/
	public function AutenticarUsuario($user, $senha, $reconhecer)
	{
		if ($user == NULL || $user == '')
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um nome de usu�rio');
			location.href = '".SYS_ROOT_DIR."';
			</script>
			";
			return false;
		}
		if ($senha == md5 (NULL) || $senha == md5 (''))
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite uma senha');
			location.href = '".SYS_ROOT_DIR."';
			</script>
			";
			return false;
		}
		
		$My = new MySQLiConnection();
		$sql = $My->query ("Select * From usuarios Where login = '".$user."'");
		$total = $sql->num_rows;
		if ($total == 0)
		{
		    // usu�rio n�o encontrado
			session_destroy();
		    echo "
		    <script type=\"text/javascript\">
		    alert ('Usu�rio \"".$user."\" n�o encontrado');
		    location.href = '".SYS_ROOT_DIR."/';
		    </script>
		    ";
		    return false;
		}
		if ($total == 1)
		{
			$f = $sql->fetch_object();
			$id_bd = $f->id;
			$user_bd = $f->login;
			$senha_bd = $f->senha;
			$nivel = $f->id_nivel;
			$ativado = $f->ativado;
			if ($ativado == "s")
			{
			    if ($senha_bd == $senha)
				{ //senha v�lida
			      $_SESSION['login']['id_usuario'] = $id_bd;
			      $_SESSION['login']['user'] = $user_bd;
			      $_SESSION['login']['senha'] = $senha_bd;
			      $_SESSION['login']['nivel'] = $nivel;
			      $_SESSION['login']['auth'] = md5 (1);
			      
				  // 31536000 = 60 * 60 * 24 * 365
				  if ($reconhecer == "s")
			          setcookie ("login", serialize ($_SESSION['login']), time() + 31536000, "/");
			      header ("Location: ".SYS_ROOT_DIR);
			      return true;
		        }
			    else
			    {   //senha inv�lida
		            session_destroy();
		            echo "
		            <script type=\"text/javascript\">
		            alert ('Senha inv�lida para o usu�rio \"".$user."\".');
		            location.href = '".SYS_ROOT_DIR."/';
		            </script>
		            ";
		            return false;
		        }
		    }
		    else
		    {   //conta n�o ativada por e-mail
				session_destroy();
				echo "
				<script type=\"text/javascript\">
				alert ('Voc� ainda n�o ativou seu cadastro.');
				location.href = '".SYS_ROOT_DIR."';
				</script>
				";
				return false;
			}
		}
	}
	
	
	
}
?>