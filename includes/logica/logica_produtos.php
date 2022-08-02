<?php
    require_once('conecta.php');
    require_once('funcoes_produto.php');

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        $idcategoria = $_POST['categoria'];
        $array = array($nome, $desc, $quantidade, $idcategoria);
    
        $resultado = inserirProduto($conexao, $array);
        header('location:../../cadastrarProduto.php');
    }

    if(isset($_POST['pesquisar'])){
        $nome = $_POST['nome'];
        $array=array("%".$nome."%");
        $produtos=pesquisarProduto($conexao, $array);
        require_once('../../mostrarProduto.php');
    }

?>