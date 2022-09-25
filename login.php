<link rel="stylesheet" href="assets/css/login.css">
<script src="assets/js/validacao.js"></script>
<title>Login</title>
</head>

<body>
    <?php require('includes/componentes/header.php');
    session_start();
    ?>
    <main>
        <section>
            <div id="login">
                <h1> Login </h1>

                <form action="includes/logica/logica_pessoa.php" method="POST">
                    <label for="email"> </label><input type="text" name="email" id="email" placeholder="Email" required onchange="validateFields();">
                    <label for=" senha"></label><input type="password" name="senha" id="senha" placeholder="Senha" required>
                    <button type="submit" id='entrar' name='entrar' value="Entrar" class="btn btn-primary"> Entrar </button>
                </form>


            </div>



            <div id="mensagem">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div><br>
            <a href="cadastrarPessoa.php"> Novo Usuário? </a><br>
            <a href="perdiSenha.php"> Esqueceu sua senha? </a>
        </section>
    </main>
</body>
</html>