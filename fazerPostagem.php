<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
?>
<title>Realizar Postagem</title>
</head>
<body>

<main>
    <section>
</form>
	<form action="includes/logica/logica_postagem.php" method="POST">
	
	<input type="hidden" name="idpessoa" value="<?php echo $_SESSION['id']?>">
    <input type="hidden" value="data">
    <label for="horariosaida">Horario saida: </label><input type="text" name="horariosaida">
    <label for="horariochegada">Horario chegada: </label><input type="text" name="horariochegada">
    <label for="preco">Preco: </label><input type="text" name="preco">
    <label for="idcarro">Carro: </label><input type="text" name="idcarro">
    <label for="conteudo">Conteudo:</label><input type="text" name="conteudo">
    <label for="cep">Cep: </label><input type="text"name="cep">
    <label for="bairro">Bairro: </label><input type="text"name="bairro">
    <label for="logradouro">Logradouro: </label><input type="text" name="logradouro">
    <input type="reset" name="botao" value="Limpar">
    <input type="submit" name="Postar" value="Postar" >

</form>
    </section>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
</html>
