<!DOCTYPE html>
<html>
<?php
include_once('includes/componentes/cabecalho.php');
?>
<title>Realizar Postagem</title>
</head>

<body>
    <?php require('includes/componentes/footer.php'); ?>
    <main>
    <h1> Fazer Postagem </h1>
        <section id="fazPostagem">

            <form action="includes/logica/logica_postagem.php" method="POST">

                <input type="hidden" name="idpessoa" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" value="data">
                <label for="data">Data da carona: </label><input type="date" name="data">
                <label for="horariosaida">Horario saida: </label><input type="time" name="horariosaida">
                <label for="horariochegada">Horario chegada: </label><input type="time" name="horariochegada">
                <label for="preco">Preco: </label><input type="text" name="preco">
                <label for="idcarro">Carro: </label><input type="text" name="idcarro">
                <label for="conteudo">Conteudo:</label><input type="text" name="conteudo">
                <label for="cep">Cep: </label><input type="text" name="cep" id="cep">
                <label for="bairro">Bairro: </label><input type="text" name="bairro" id="bairro">
                <label for="logradouro">Logradouro: </label><input type="text" name="logradouro" id="logradouro">
                <button type="reset" name="botao" class="reset"> Reset </button>
                <button type="submit" name="postar" class="postar"> Postar </button>

            </form>
    </main>
</body>
<script src="assets/js/index.js"></script>

</html>