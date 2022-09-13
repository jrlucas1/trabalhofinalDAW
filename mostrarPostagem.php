<?php
 include_once('includes/componentes/cabecalho.php');
 include_once('includes/logica/funcoes_postagem.php');
 include_once('includes/logica/funcoes_comentario.php');
 include_once('includes/logica/conecta.php');
?>
    <link rel="stylesheet" href="assets/css/listarUsuarios.css">
    <title>Piracaronas</title>
</head>
<body>
<?php require('includes/componentes/header.php') ?>
<main>
    <?php
        $email = $_SESSION['email'];
        $postagens = listarPostagem($conexao);
        if(empty($postagens)){
            ?>
                <section>
                    <p>Não há nenhuma postagem</p>
                </section>
            <?php
        }
        foreach($postagens as $postagem){
                 $array = array($postagem['id']);
                 $comentarios = listarComentarios($conexao, $array);
            ?>
            
                <section>
                    <p>Horario de saida: <?php echo $postagem['horariosaida']; ?></p>
                    <p>Horario de chegada: <?php echo $postagem['horariochegada']; ?></p>
                    <p>Preço: <?php echo $postagem['preco']; ?></p>
                    <p>Carro: <?php echo $postagem['idcarro']; ?></p>
                    <p>Conteudo: <?php echo $postagem['conteudo']; ?></p>
                    <p>CEP: <?php echo $postagem['conteudo']; ?></p>                   
                    <p>Bairro: <?php echo $postagem['bairro']; ?></p>
                    <p>Logradouro: <?php echo $postagem['logradouro']; ?></p>
                    <form action="includes/logica/logica_postagem.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $postagem['id']; ?>" class="btn btn-primary"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $postagem['id']; ?>" onclick ="return confirma_excluir()" class="btn btn-primary"> Deletar </button> 
                    </form>
                <div id="comentarios">
                <?php 
               if(isset($comentarios)){
                foreach($comentarios as $comentario){

                ?>

                <p>Conteudo comment: <?php echo $comentario['conteudo'];?>

                <br>
                <br>

                </div>
            <?php      }
    } ?>
                </section>
        <?php
}
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>