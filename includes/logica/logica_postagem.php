<?php
    require_once('conecta.php');
    require_once('funcoes_postagem.php');

    if(isset($_POST['postar'])){

        $idpessoa = $_POST['idpessoa'];
        $data = $_POST['data'];
        $horariosaida = $_POST['horariosaida'];
        $horariochegada = $_POST['horariochegada'];
        $preco = $_POST['preco'];
        $idcarro = $_POST['idcarro'];
        $conteudo = $_POST['conteudo'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $logradouro = $_POST['logradouro'];
        $array = array($idpessoa, $data, $horariosaida, $horariochegada, $preco, $idcarro, $conteudo, $cep, $bairro, $logradouro);

        $resultado = fazerPostagem($conexao, $array);
        header('location:../../fazerPostagem.php');
    }

    if(isset($_POST['editar'])){

        $id = $_POST['editar'];
        $array = array($id);
        $postagem=buscarPostagem($conexao, $array);
        require_once('../../editarPostagem.php');
}

    if(isset($_POST['alterar'])){

        $data = $_POST['data'];
        $horariosaida = $_POST['horariosaida'];
        $horariochegada = $_POST['horariochegada'];
        $preco = $_POST['preco'];
        $idcarro = $_POST['idcarro'];
        $conteudo = $_POST['conteudo'];
        $cep = $_POST['cep'];
        $bairro = $_POST['bairro'];
        $logradouro = $_POST['logradouro'];
        $array = array($data, $horariosaida, $horariochegada, $preco, $idcarro, $conteudo, $cep, $bairro, $logradouro);
        updatePostagem($conexao, $array);
        header('location:../../index.php');
}

    if(isset($_POST['deletar'])){
        $id = $_POST['deletar'];
        $array=array($id);
        deletarPostagem($conexao, $array);

        header('Location:../../mostrarPostagem.php');
}
    if(isset($_POST['pesquisar'])){
        $nome = $_POST['nome'];
        $array=array("%".$nome."%");
        $produtos=pesquisarPostagemPorNomePessoa($conexao, $array);
        require_once('../../mostrarPostagem.php');
    }

?>