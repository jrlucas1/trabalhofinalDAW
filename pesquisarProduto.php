<?php
include_once('includes/componentes/cabecalho.php');
?>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Pesquisar produto</title>
</head>

<body>
    <main>

        <div class="form">
            <form action="includes/logica/logica_produtos.php" method="post">
                <label for="search">Procure um produto:</label>
                <input type="text" id="nome" name="nome">
                <input type="submit" id="pesquisar" name="pesquisar" value="Pesquisar">
            </form>


    </main>
</body>

</html>