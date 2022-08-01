<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
?>
<title>cadastrar produto</title>
</head>
<body>

<main>
    <section>
</form>
	<link rel="stylesheet" href="styles.css">
	<form action="includes/logica/logica_produtos.php" method="POST">
	
	<div class="form-group">
      <label for="nome">Nome: </label><input type="text" name="nome" id="nome" class="form-control">
      </div>

      <div class="form-group" >
      <label for="descricao">Descricao: </label><input type="text" name="descricao" id="descricao" class="form-control">
      </div>

      <div class="form-group">
      <label for="quantidade">Senha: </label> <input type="text" name="quantidade" id="quantidade" class="form-control">
      </div>
      
      <div class="form-group">
      <label for="categoria">Categoria: </label> 
      <input type="radio" name="categoria" id="categoria" class="form-control" value="1">Brinquedo
	  <input type="radio" name="categoria" id="categoria" class="form-control" value = "2">Sapatos
	  <input type="radio" name="categoria" id="categoria" class="form-control" value="3">Potes
		</div>

	<input type="reset" name="botao" value="Limpar" class="btn btn-primary">
	<input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-primary">
</form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
