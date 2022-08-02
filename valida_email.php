<?php
session_start();
include("funcoes_pessoa.php");
if($_GET['h']){
	$h=$_GET['h'];
   	$_SESSION["msg"]=''; 
	

	$array = array($h);

	$linha=pesquisarPessoaEmail($conexao,$array);

	if($linha) // Se existir o código ele ira fazer a alteração do status para true no banco de dados;
	{

		$array=array($linha['codpessoa']);

		$retorno=alterarStatustrue($conexao, $array);
		
		if($retorno) // Se fizer essa alteração será enviada está mensagem
		{
			
		
			   $_SESSION["msg"]= "Cadastro Validado - Entre com seu email e senha";

		}
		else // Se não, será enviada essa mensagem.
		{
			   $_SESSION["msg"]= 'Problema na validação';
			   
		}	
	}

	else
	{
		$_SESSION["msg"]= 'Problema na validação';
	}	

header("Location:login.php");
	
}
