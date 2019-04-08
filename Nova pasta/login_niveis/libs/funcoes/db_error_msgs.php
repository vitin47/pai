<?php
/* Mensagens de erro amig�veis de bancos de dados

   Estas fun��oes devem ser chamadas por meio da fun��o call_user_func(), para que o n�mero do erro possa ser concatenado ao nome da fun��o. Exemplo:

<?php
$cod_erro = 1045;
if (function_exists ("Erro".$cod_erro))
    call_user_func ("Erro".$cod_erro[, argumentos]);
?>
*/

function Erro1005 ($tb_name = NULL)
{
	if ($tb_name != NULL)
	    echo "N�o foi poss�vel criar a tabela <strong>" . $tb_name ."</strong>";
	else
	    echo "Erro ao criar a tabela";
}

function Erro1006 ($db_name = NULL)
{
	if ($db_name != NULL)
	    echo "N�o foi poss�vel criar o banco de dados <strong>" . $db_name ."</strong>";
	else
	    echo "Erro ao criar o banco de dados";
}

function Erro1007 ($db_name = NULL)
{
	if ($db_name != NULL)
	    echo "O banco de dados <strong>" . $db_name ."</strong> j� existe.";
	else
	    echo "Esse banco de dados j� existe.";
}

function Erro1040 ()
{
	echo "N�mero m�ximo de conex�es excedido.";
}

function Erro1045 ($username = NULL)
{
	if ($username != NULL)
	    echo "Acesso negado para o usu�rio <strong>" . $username . "</strong>";
	else
	    echo "Acesso ao banco de dados negado.";
}

function Erro1046 ()
{
	echo "Nenhum banco de dados selecionado.";
}


function Erro1049 ($db_name = NULL)
{
	if ($db_name != NULL)
	    echo "O banco de dados <strong>" . $db_name . "</strong> n�o foi encontrado";
	else
	    echo "Banco de dados n�o encontrado.";
}

function Erro1050 ($tb_name = NULL)
{
	if ($tb_name != NULL)
	    echo "A tabela <strong>" . $tb_name . "</strong> j� existe";
	else
	    echo "Tabela j� existente.";
}

function Erro1051 ($tb_name = NULL)
{
	if ($tb_name != NULL)
	    echo "A tabela <strong>" . $tb_name . "</strong> n�o foi encontrada";
	else
	    echo "Tabela n�o encontrada.";
}

function Erro1062 ($field_name = NULL)
{
	if ($field_name != NULL)
	    echo "Entrada duplicada para o campo  <strong>" . $field_name . "</strong>";
	else
	    echo "Entrada duplicada em chave �nica";
}

function Erro1065 ()
{
	echo "Consulta (query) vazia.";
}

function Erro1146 ($tb_name = NULL)
{
	if ($tb_name != NULL)
	    echo "A tabela <strong>" . $tb_name . "</strong> n�o foi encontrada";
	else
	    echo "Tabela n�o encontrada.";
}

function Erro2000 ()
{
	echo "Erro desconhecido do MySQL.";
}

function Erro2003 ($host = NULL)
{
	if ($host != NULL)
	    echo "Imposs�vel conectar ao servidor MySQL em <strong>" . $host . "</strong>";
	else
	    echo "Imposs�vel conectar ao servidor MySQL.";
}

function Erro2005 ($host = NULL)
{
	if ($host != NULL)
	    echo "O servidor <strong>" . $host . "</strong> n�o foi encontrado";
	else
	    echo "Servidor n�o encontrado";
}

function Erro2013 ()
{
	echo "A conex�o com o MySQL foi perdida durante a consulta SQL.";
}


?>