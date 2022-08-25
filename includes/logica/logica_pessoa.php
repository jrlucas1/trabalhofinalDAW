<?php
    require_once('conecta.php');
    require_once('funcoes_pessoa.php');
    require_once('config_upload.php'); // arquivo que contém as variáveis de configuração
#CADASTRO PESSOA
    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha= password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $nome_arquivo=$_FILES['imagem']['name'];  
        $tamanho_arquivo=$_FILES['imagem']['size']; 
        $arquivo_temporario=$_FILES['imagem']['tmp_name'];

        if (!empty($nome_arquivo)){

        if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
            die("Arquivo já existe");

        if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))  
            die("Arquivo deve ter o no máximo $tamanho_bytes bytes");

        $ext = strrchr($nome_arquivo,'.');
        if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
            die("Extensão de arquivo inválida para upload");

        if (move_uploaded_file($arquivo_temporario, "../../imagens/$nome_arquivo")) {
                echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso <br>";
         }
        }
        $array = array($nome, $email, $senha, $nome_arquivo);
        $retorno=inserirUsuario($conexao, $array);
		
	    if($retorno)
        {
                $hash=md5($email);
                $link="<a href='localhost/atv1daw/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
                $mensagem="<tr><td style='padding: 10px 0 10px 0;' align='center' bgcolor='#669999'>";
                $mensagem.="<img src='cid:logo_ref' style='display: inline; padding: 0 10px 0 10px;' width='10%' />";

                $mensagem.="Email de Confirmação <br>".$link."</td></tr>";
                $assunto="Confirme seu cadastro";

                $retorno= enviarEmail($nome,$email,$assunto,$mensagem);
        
                $_SESSION["msg"]= "Valide o Cadastro no email";

        }
        else
        {
               $_SESSION["msg"].= 'Erro ao inserir <br>';
        }
        header('location:../../login.php');
   
        
}
#ENTRAR
    if(isset($_POST['entrar'])){
        

        session_start();
        $_SESSION['msg'] ='';
        $email=$_POST["email"];
        $senha=$_POST["senha"];


        if (!(empty($email) OR empty($senha))) // testa se os campos do formulário não estão vazios
        {
             
            $array = array($email);
    
            $resultado=acessarUsuario($conexao, $array);
            if ($resultado) 
            {
            if (password_verify($senha,$resultado['senha']))
            {
            $_SESSION["logado"]=true; // armazena TRUE na variável de sessão logado
            $_SESSION["email"]=$email; // armazena na variável de sessão email o conteúdo do campo email do formulário
            $_SESSION["idusuarios"]=$resultado['idusuarios'];
            $_SESSION["nome"] = $resultado['nome'];
            
            header("Location:../../index.php"); // direciona para o index
             }
             else
             {
                 $_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela pessoa com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
                header("Location:../../login.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
             }
            }
            else
            {
                $_SESSION["msg"]="Usuário ou senha inválidos"; // caso não exista uma linha na tabela pessoa com o email e a senha válidos uma mensagem é armazenada na variável de sessão msg
                header("Location:../../login.php"); // o fluxo da aplicação é direcionado novamente parvo formulário de login - onde a variável de sessão contendo a mensagem será exibida
            }
        }
        else // else correspondente ao resultado da função !empty 
        {
            $_SESSION["msg"]="Preencha campos email e senha"; // caso contrário, ou seja, os campos do formulário email e senha estejam vazios, a mensagem é armazenada na variável msg
            header("Location:../../login.php"); // o fluxo da aplicação é direcionado novamente para o formulário de login - onde a variável de sessão contendo a mensagem será exibida
        }
    }
    
#SAIR
    if(isset($_POST['sair'])){
            session_start();
            session_destroy();
            header('location:../../login.php');
    }

#EDITAR PESSOA
    if(isset($_POST['editar'])){
    
            $idusuarios = $_POST['editar'];
            $array = array($idusuarios);
            $pessoa=buscarUsuario($conexao, $array);
            require_once('../../alterarPessoa.php');
    }    
#ALTERAR PESSOA
    if(isset($_POST['alterar'])){
    
            $idusuarios = $_POST['alterar'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];    
            $array = array($nome, $email, $senha, $idusuarios);
            alterarUsuario($conexao, $array);
            header('location:../../index.php');
    }
#DELETAR PESSOA
    if(isset($_POST['deletar'])){
        $idusuarios = $_POST['deletar'];
        $array=array($idusuarios);
        deletarUsuario($conexao, $array);

        header('Location:../../index.php');
    }

#PESQUISAR PESSOA
    if(isset($_POST['pesquisar'])){
        $nome = strtoupper($_POST['nome']);
        $array=array("%".$nome."%");
        $pessoas=pesquisarPessoa($conexao, $array);
        require_once('../../mostrarPessoa.php');
    }
#ALTERAR PERFIL
    if(isset($_POST['alterarPerfil'])){
            session_start();
            $idusuario = $_POST['idusuarios'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];    
            $array = array($nome, $email, $senha, $idusuario);
            alterarPessoa($conexao, $array);
            $_SESSION['nome'] = $nome;
            echo $_SESSION['nome'];
            header('location:../../alterarPerfil.php');
    }

#ENVIAR EMAIL
    if (isset($_POST['enviarEmail'])){
    
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        
        $resultado = enviarEmail($nome,$email,$assunto,$mensagem);
}

    if (isset($_POST['esqueceuSenha'])){
        
        $email = $_POST['email'];
        $retorno = pesquisarPessoaEmail($conexao, md5($email));
        if($retorno)
        {
                $hash=md5($email);
                $link="<a href='localhost/atv1daw/trocaSenha.php?h=".$hash."'> Clique aqui para alterar sua senha </a>";

                $mensagem.="Email para alteração de senha <br>".$link."</td></tr>";
                $assunto="Confirme seu cadastro";

                $retorno= enviarEmail($nome,$email,$assunto,$mensagem);
        
                $_SESSION["msg"]= "Um email com o link para redefinir sua senha foi enviado";

        }
        else
        {
               $_SESSION["msg"].= 'Não existe nenhuma conta com este email';
        }
        header('location:../../login.php');
    
    
    $resultado = enviarEmail($nome,$email,$assunto,$mensagem);
    }

    if (isset($_POST['alterarSenha'])){
        
        $idusuarios = $_POST['idusuarios'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        $array = array($senha, $idusuarios);
        
        $retorno = alterarSenha($conexao, $array);
        if($retorno) // Se fizer essa alteração será enviada está mensagem
		{
		
			   $_SESSION["msg"]= "Sua senha foi alterada com sucesso!";

		}
		else // Se não, será enviada essa mensagem.
		{
			   $_SESSION["msg"]= 'Houve um problema a tentar alterar sua senha, tente novamente.';
			   
		}

        header('location:../../login.php');
    }

    #ESQUECEU A SENHA
    if(isset($_POST['esqueciSenha'])){
    
        $email =  $_POST['email'];
        $chave = sha1(uniqid( mt_rand(), true));

        $array1= array(md5($email));
        // vai pesquisar a pessoa pelo email para ver se existe no banco de dados;
        $resultado = pesquisarPessoaEmail($conexao, $array1);

        
        if($resultado){
        $array = array($email, $chave);
        $teste = esqueciSenha($conexao, $array);     
    
        $link="<a href='localhost/atv1daw/recuperar.php?email=".$email."&conf=".$chave."'> Clique aqui para alterar sua senha </a>";
    
        $mensagem="Email para alteração de senha <br>".$link."</td></tr>";
        $assunto="Resetar a sua senha";
        $nome = "usuario";
        $retorno= enviarEmail($nome,$email,$assunto,$mensagem);
            
         $_SESSION["msg"]= "Um email com o link para redefinir sua senha foi enviado";
         header('location:../../login.php');    
         }else{
         $_SESSION["msg"]= "Email não existe na base de dados, verifique se digitou corretamente";
         header('location:../../login.php');
    }
}

?>
