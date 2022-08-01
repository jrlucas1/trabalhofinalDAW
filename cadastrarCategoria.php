<!DOCTYPE html>
<html>
<?php include_once('includes/componentes/cabecalho.php');
?>
    <title>Adicionar produto</title>
</head>
<body>

<main>
    <section>
<form>
	<form action="" method="POST">
	<label for="nomecategoria"> Nome da categoria: </label> <input type="text" name="nomeprod">
	<input type="reset" name="botao" value="Limpar" class ="btn btn-primary" >
	<input type="submit" name="botao" value="Cadastrar" class ="btn btn-primary">
</form>
    </section>
<?php require('includes/componentes/footer.php');
?>
</main>
</body>
</html>
