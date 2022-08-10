<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/header.php');
?>
    <title>Esqueci minha senha</title>
</head>
<body>

<main>
    <section>
    <form action="includes/logica/logica_pessoa.php" method="post">
      <p><label for="email">Email: </label><input type="text" name="email" id="email"></p>
      <p> <input type="submit" id='esqueceuSenha' name='esqueceuSenha' value="Enviar">
      </p>        
        </form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>