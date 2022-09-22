<!DOCTYPE html>
<html>
<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
?>
<title>Alterar Usuário</title>
</head>

<body>
<?php require('includes/componentes/footer.php'); ?>
    <main>
        <section>
            <form action="includes/logica/logica_pessoa.php" method="post">
                <p><label for="email">Senha: </label><input type="password" name="senha" id="senha"></p>
                <input type="hidden" id='id' name='idusuarios' value="<?php echo $_SESSION['id']; ?>">
                <p> <input type="submit" id='alterarSenha' name='alterarSenha' value="Alterar senha">
                </p>
            </form>
        </section>
    </main>

</body>

</html>