<?php
#############################################
#                                           #
# Autor: Roberto Beraldo Chaiben (Beraldo)  #
#      E-Mail: rbchaiben@gmail.com          #
#                                           #
#############################################

/*
   Classe para autenticação de usuários segundo níveis de acesso, sendo eles:
   
   1 -> Conta de Administradores
   2 -> Conta de Usuário Comuns
*/

class Login{
	
	/*
	   Função RegistrarUsuario
	   Esta função é utilizada para inserir um novo cadastro na tabela de usuários, além de chamar a função EnviarAtivação(), a qual usa a classe PHPMailer para enviar a mensagem para ativação de registro no sistema.
	*/
	public function RegistrarUsuario ($nome, $email, $login, $senha1, $senha2)
	{
		$erro = array();
		if ($email == NULL || $email == '')
		    $erro[] = "Informe seu e-mail.";
		if (!ValidarEmail ($email))
		    $erro[] = "O e-mail informado é inválido.";
		if ($login == NULL || $login == '')
		    $erro[] = "Escolha um login (nome de usuário).";
		if (strlen ($login) > 30)
		    $erro[] = "O login não pode ter mais de 30 caracteres.";
		if ($senha1 == NULL || $senha1 == '')
		    $erro[] = "Digite uma senha.";
		if ($senha2 == NULL || $senha2 == '')
		    $erro[] = "Você não confirmou sua senha.";
		if ($senha1 != $senha2)
		    $erro[] = "Você digitou duas senhas diferentes.";
		
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
		
		//nome da tabela na qual são inseridos os dados dos usuários
		$tb_name = "usuarios";
		$sql = @$My->query ("Insert Into ".$tb_name." Values (NULL, '".$nome."', '".$login."', '".$senha."', 2, NOW(), 'n')");
		if ($sql === true)
		{
		    if ($My->affected_rows == 1)
		    {
			    $id = $My->insert_id;
			    $send = $this->EnviarAtivação($nome, $login, $email, $senha1, $id);
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
			{//se houver a função de erro personalizada
				switch ($error_code)
				{
					case 1051:
					  Erro1051 ($tb_name);
					  break;
					case 1062:
					  echo "<h3 style=\"color:red;\">O nome de usuário que você escoljeu já existe.</h3>";
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
	   Função EnviarAtivação
	   Utiliza a classe PHPMailer para enviar, via SMTP, a mensagem para ativação do registro.
	*/
	private function EnviarAtivação($nome, $login, $email, $senha, $id)
	{
		//id codificado em base_64
		$id = base64_encode ($id);
		
		$Mail = new PHPMailer;
		$Mail->From = "email@sistemadelogin.com.br";// e-mail do sistema
		$Mail->FromName = "Sistema de Login";// nome do sistema
		$Mail->Subject = "Ativação de Cadastro";// assunto da mensagem
		$Mail->IsSMTP();
		$Mail->Host = SMTP_SERVIDOR;//servidor SMTP
		$Mail->SMTPAuth = true;
		$Mail->Username = SMTP_USUARIO;// Nome de usuário do SMTP
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
		Você se regsitrou em nosso sistema com os seguintes dados:
		\n\n
		Nome de Usuário (Login): ".$login."
		\n
		Senha: ".$senha."
		\n\n\n
		Para ativar a sua conta, visite o endereço abaixo:\n\n
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
	   Função AutenticarUsuario
	   Destinada à autenticação dos usuários (login) propriamente dita.
	   O primeiro parâmetro é o nome de usuário (login), o segundo, a senha. O terceiro recebrá o valor "s", se o usuário selecionou "Reconhecer-me automaticamente"; caso contrário, receberá "n". O reconhecimento automático é feito por meio de um cookie denominado "login".
	*/
	public function AutenticarUsuario($user, $senha, $reconhecer)
	{
		if ($user == NULL || $user == '')
		{
			echo "
			<script type=\"text/javascript\">
			alert ('Digite um nome de usuário');
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
		    // usuário não encontrado
			session_destroy();
		    echo "
		    <script type=\"text/javascript\">
		    alert ('Usuário \"".$user."\" não encontrado');
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
				{ //senha válida
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
			    {   //senha inválida
		            session_destroy();
		            echo "
		            <script type=\"text/javascript\">
		            alert ('Senha inválida para o usuário \"".$user."\".');
		            location.href = '".SYS_ROOT_DIR."/';
		            </script>
		            ";
		            return false;
		        }
		    }
		    else
		    {   //conta não ativada por e-mail
				session_destroy();
				echo "
				<script type=\"text/javascript\">
				alert ('Você ainda não ativou seu cadastro.');
				location.href = '".SYS_ROOT_DIR."';
				</script>
				";
				return false;
			}
		}
	}
	
	
	
}
?>