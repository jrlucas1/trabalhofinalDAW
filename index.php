<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/logica/funcoes_postagem.php');
include_once('includes/logica/funcoes_comentario.php');
include_once('includes/logica/conecta.php');
include_once('includes/logica/funcoes_pessoa.php')
?>

<head>
    <link rel="stylesheet" href="assets/css/mostrarPostagem.css">
    <title>Piracaronas</title>
</head>

<body>
    <?php require('includes/componentes/footer.php') ?>
    <main>
        <h1>Pagina Inicial</h1>
        <?php
        $email = $_SESSION['email'];
        $postagens = listarPostagem($conexao);
        if (empty($postagens)) { ?>
            <section>
                <p>Não há nenhuma postagem</p>
            </section>
        <?php
        }
        foreach ($postagens as $postagem) {
            $array = array($postagem['id']);
            $comentarios = listarComentarios($conexao, $array);
            $array1 = array($postagem['idpessoa']);
            $pessoapost = buscarUsuario($conexao, $array1);
        ?>
            <section id="post_comments">
                <h2> <?php echo $pessoapost['nome']; ?> </h2>
                <p class="horario">Horario de saida: <?php echo $postagem['horariosaida']; ?></p>
                <p class="horario">Horario de chegada: <?php echo $postagem['horariochegada']; ?></p>
                <p class="horario">Preço: R$ <?php echo $postagem['preco']; ?></p>
                <p class="horario">Carro: <?php echo $postagem['idcarro']; ?></p>
                <p class="conteudo">Conteudo: <?php echo $postagem['conteudo']; ?></p>
                <p class="local">CEP: <?php echo $postagem['cep']; ?></p>
                <p class="local">Bairro: <?php echo $postagem['bairro']; ?></p>
                <p class="local">Logradouro: <?php echo $postagem['logradouro']; ?></p>
                <?php
                if ($postagem['idpessoa'] == $_SESSION['id']) {
                ?>
                    <form action="includes/logica/logica_postagem.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $postagem['id']; ?>" class="btn btn-primary"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $postagem['id']; ?>" onclick="return confirma_excluir()" class="btn btn-primary"> Deletar </button>
                    </form>
                <?php } ?>
                <div id="comentarios">
                    <?php
                    if (isset($comentarios)) {
                        foreach ($comentarios as $comentario) {
                            $array2 = array($comentario['idpessoa']);
                            $usercomm = buscarUsuario($conexao, $array1);
                    ?>
                            <p><?php echo $usercomm['nome']; ?> disse:
                            <p> <?php echo $comentario['conteudo']; ?> <?php } ?></p>
                            </p>
                </div>
            <?php
                    } ?>
            <form action="includes/logica/logica_comentario.php" method="post">
                <input type="hidden" name="idpessoa" value="<?php echo $_SESSION['id']; ?>"><br>
                <input type="hidden" name="idpostagem" value="<?php echo $postagem['id']; ?>"><br>
                <label for="conteudo">Faça um comentario</label><input type="text" name="conteudo">
                <button type="submit" name="comentar" value="<?php echo $postagem['id']; ?>">Comentar</button>
            </form>
            </section>
        <?php
        }
        ?>
    </main>
</body>

</html>