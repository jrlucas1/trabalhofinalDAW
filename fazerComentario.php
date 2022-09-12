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
	<form action="includes/logica/logica_postagem.php" method="POST">
	
	<input type="hidden" name="idpessoa" value="<?php echo $_SESSION['id']?>">
    <input type="hidden" value="idpostagem">
    <input type="hidden" value="data">
    <input type="text" value="conteudo">
    <input type="reset" name="botao" value="Limpar">
    <input type="submit" name="Postar" value="Postar" >

</form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
