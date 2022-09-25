<link rel="stylesheet" href="assets/css/index.css">
<title>Cadastrar Usuário</title>
</head>
<script src="assets/js/validacao.js"></script>
<body>
    <?php require('includes/componentes/header.php') ?>
    <?php require('includes/componentes/footer.php'); ?>
    <main>
        <section>
            <form action="includes/logica/logica_pessoa.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="email">Email: </label><input type="text" name="email" id="email" onchange="validateFields();" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha: </label> <input type="password" name="senha" id="senha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nome">Nome: </label><input type="text" name="nome" id="nome" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="idade">Idade: </label> <input type="text" name="idade" id="idade" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="imagem">Foto: </label> <input type="file" name="imagem" id="imagem" class="form-control" required>
                </div>
                <div id="mensagem"></div>
                <button type="submit" id='cadastrar' name='cadastrar' value="Cadastrar" class="btn btn-primary"> Cadastrar </button>
            </form>

        </section>
    </main>
</body>

</html>