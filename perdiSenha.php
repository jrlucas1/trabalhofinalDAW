<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
?>
<title>Recuperar Senha</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<main>
<section>
	<form action="includes/logica/logica_pessoa.php" method="post">
	
		<div class="form-group">
      	<label for="nome">Email: </label><input type="text" name="email" id="email" class="form-control">
      	</div>

		<input type="reset" name="botao" value="Limpar" class="btn btn-primary">
		<input type="submit" name="esqueciSenha" value="Enviar o email" class="btn btn-primary">
	</form>
</section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>