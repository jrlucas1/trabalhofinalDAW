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
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>"></p>
      <p><label for="email">Email: </label><input type="text" name="email" id="email" value="<?php echo $usuario['email']; ?>"></p>
      <input type="hidden" id='id' name='id' value="<?php echo $pessoa['id']; ?>">
      <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
      </p>        
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>