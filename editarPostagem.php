<!DOCTYPE html>
<link rel="stylesheet" href="assets/css/index.css">
<html>
<?php include_once('includes/componentes/cabecalho.php');?>
<body>
<?php require('includes/componentes/footer.php');?>
<main>
    <title>Alterar Postagem</title>
</head>
<body>

<main>
    <section>
    <form action="logica_postagem.php" method="post">
      <p><label for="horariosaida">Horario saida: </label><input type="time" name="horariosaida" id="horariosaida" value="<?php echo $postagem['horariosaida']; ?>"></p>
      <p><label for="horariochegada">Horario chegada: </label><input type="time" name="horariochegada" id="horariochegada" value="<?php echo $postagem['horariochegada']; ?>"></p>
      <p><label for="preco">Preco: </label><input type="text" name="preco" id="preco" value="<?php echo $postagem['preco']; ?>"></p>
      <p><label for="carro">Carro: </label><input type="text" name="carro" id="carro" value="<?php echo $postagem['idcarro']; ?>"></p>
      <p><label for="conteudo">Conteudo: </label><input type="text" name="conteudo" id="conteudo" value="<?php echo $postagem['conteudo']; ?>"></p>
      <p><label for="cep">Cep: </label><input type="text" name="cep" id="cep" value="<?php echo $postagem['cep']; ?>"></p>
      <p><label for="bairro">Bairro: </label><input type="text" name="bairro" id="bairro" value="<?php echo $postagem['bairro']; ?>"></p>
      <p><label for="logradouro">Logradouro: </label><input type="text" name="logradouro" id="logradouro" value="<?php echo $postagem['logradouro']; ?>"></p>
      <input type="hidden" id='id' name='id' value="<?php echo $postagem['id']; ?>">
      <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
      </p>        
        </form>
    </section>
</main>
</body>
</html>