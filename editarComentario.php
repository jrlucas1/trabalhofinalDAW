<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
 include_once('includes/componentes/header.php');


?>
    <title>Alterar Usuário</title>
</head>
<body>

<main>
    <section>
    <form action="logica_pessoa.php" method="post">
      <p><label for="conteudo">Conteudo: </label><input type="text" name="conteudo" id="conteudo" value="<?php echo $comentario['conteudo']; ?>"></p>
      <input type="hidden" id='id' name='id' value="<?php echo $comentario['id']; ?>">
      <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
      </p>        
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>