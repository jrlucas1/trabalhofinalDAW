<!DOCTYPE html>
<html>
<link rel="stylesheet" href="assets/css/login.css">

<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
?>
<title>Listar Usuário</title>
</head>

<body>

    <body>

        <main>
            <?php require('includes/componentes/footer.php'); ?>
            <h1> Listagem de Usuários </h1>
            <?php
            $usuarios = listarUsuario($conexao);
            if (empty($usuarios)) {
            ?>
                <section>
                    <p>Não há usuários cadastrados.</p>
                </section>
            <?php
            }
            foreach ($usuarios as $usuario) {

            ?>
                <section id="userList">
                    <p>Nome: <?php echo $usuario['nome']; ?></p>
                    <p>Email: <?php echo $usuario['email']; ?></p>
                    <p>Imagem: <img src="imagens/<?php echo $usuario['foto']; ?>" width='100px' height='100px' /></p>
                    <p>ID: <?php echo $usuario['id']; ?></p>

                    <form action="includes/logica/logica_pessoa.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $usuario['id']; ?>" class="btn btn-primary"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $usuario['id']; ?>" onclick="return confirma_excluir()" class="btn btn-primary"> Deletar </button>
                    </form>
                    <br><br>
                </section>
            <?php
            }
            ?>
        </main>
    </body>
    <script type="text/javascript">
        function confirma_excluir() {
            resp = confirm("Confirma Exclusão?")

            if (resp == true) {

                return true;
            } else {
                return false;

            }

        }
    </script>

</html>