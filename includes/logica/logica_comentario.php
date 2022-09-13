<?php
    require_once('conecta.php');
    require_once('funcoes_comentario.php');

    if(isset($_POST['comentar'])){
       
        $idpessoa = $_POST['idpessoa'];
        $idpostagem = $_POST['idpostagem'];
        $data =  date('Y-m-d');
        $conteudo = $_POST['conteudo'];

        $array = array($idpessoa, $idpostagem, $data, $conteudo);
        $resultado = fazerComentario($conexao, $array);
        header('location:../../mostrarPostagem.php');
    }

    if(isset($_POST['editar'])){
    
        $id = $_POST['editar'];
        $array = array($id);
        $pessoa=buscarComentario($conexao, $array);
        require_once('../../alterarComentario.php');
}    

    if(isset($_POST['alterar'])){
        $idpessoa = $_POST['idpessoa'];
        $idpostagem = $_POST['idpostagem'];
        $data = $_POST['data'];
        $conteudo = $_POST['conteudo'];

        $array = array($idpessoa, $idpostagem, $data, $conteudo);
       
        updateComentarios($conexao, $array);
        header('location:../../index.php');
}

    if(isset($_POST['deletar'])){
        $id = $_POST['deletar'];
        $array=array($id);
        deletarPostagem($conexao, $array);

        header('Location:../../index.php');
}
    if(isset($_POST['pesquisar'])){
        $id = $_POST['id'];
        $array=array($id);
        $produtos=buscarComentario($conexao, $array);
        require_once('../../mostrarComentario.php');
    }

?>