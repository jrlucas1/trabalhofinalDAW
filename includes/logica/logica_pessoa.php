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
                $link="<a href='localhost/exemplo_funcoes_PDO_email/valida_email.php?h=".$hash."'> Clique aqui para confirmar seu cadastro </a>";
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
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $array = array($email, $senha);
        $pessoa = acessarUsuario($conexao,$array);
        if($pessoa){
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['idusuario'] = $pessoa['idusuario'];
            $_SESSION['nome'] = $pessoa['nome'];
            header('location:../../index.php');
        }
        else{
            session_start();
        	$_SESSION['msg'] = "Usuário inexistente ou senha errada";
            header('location:../../login.php');
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
    
            $idusuario = $_POST['editar'];
            $array = array($idusuario);
            $pessoa=buscarUsuario($conexao, $array);
            require_once('../../alterarPessoa.php');
    }    
#ALTERAR PESSOA
    if(isset($_POST['alterar'])){
    
            $idusuario = $_POST['idusuario'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];    
            $array = array($nome, $email, $senha, $idusuario);
            alterarUsuario($conexao, $array);
            header('location:../../index.php');
    }
#DELETAR PESSOA
    if(isset($_POST['deletar'])){
        $idusuario = $_POST['deletar'];
        $array=array($idusuario);
        deletarPessoa($conexao, $array);

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
            $idusuario = $_POST['idusuario'];
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

?>
