<!DOCTYPE html>
<html>
<?php
 include_once('includes/componentes/cabecalho.php');
?>
<title>Realizar Postagem</title>
</head>
<body>
<?php require('includes/componentes/footer.php');?>
<main>
    
    <section id="fazPostagem">
    <h1> Fazer Postagem </h1>
	<form action="includes/logica/logica_postagem.php" method="POST">
	
	<input type="hidden" name="idpessoa" value="<?php echo $_SESSION['id']?>"><br>
    <input type="hidden" value="data"><br>
    <label for="data">Data da carona: </label><input type="date" name="data"><br>
    <label for="horariosaida">Horario saida: </label><input type="time" name="horariosaida"><br>
    <label for="horariochegada">Horario chegada: </label><input type="time" name="horariochegada"><br>
    <label for="preco">Preco: </label><input type="text" name="preco"><br>
    <label for="idcarro">Carro: </label><input type="text" name="idcarro"><br>
    <label for="conteudo">Conteudo:</label><input type="text" name="conteudo"><br>
    <label for="cep">Cep: </label><input type="text"name="cep" id="cep"><br>
    <label for="bairro">Bairro: </label><input type="text"name="bairro" id="bairro"><br>
    <label for="logradouro">Logradouro: </label><input type="text" name="logradouro" id="logradouro"><br>
    <input type="reset" name="botao" value="Limpar"><br>
    <input type="submit" name="postar" value="postar" ><br>

</form>
</main>
</body>
<script src="assets/js/index.js"></script>
</html>
