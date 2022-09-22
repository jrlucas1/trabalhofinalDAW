<!DOCTYPE html>
<html>
<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
$array = array($_SESSION['id']);
$pessoa = buscarUsuario($conexao, $array);
?>
<title>Alterar Usuário</title>
</head>

<body>
    <?php require('includes/componentes/footer.php'); ?>
    <main>
    <h1> Alterar Perfil </h1>
    <section>

            <form action="logica_pessoa.php" method="post">
                <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>"></p>
                <p><label for="email">Email: </label><input type="text" name="email" id="email" value="<?php echo $pessoa['email']; ?>"></p>
                <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['id']; ?>">
                <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
                </p>
            </form>
        </section>
    </main>
</body>

</html>