<html>
<link rel="stylesheet" href="assets/css/index.css">
<body>
<nav>
        <div class="logo"> Piracaronas </div>

        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()">-</i>
        </div>

        <ul>
        <li><a href="/trabalho/index.php">Início</a></li>
        <?php if(isset($_SESSION['logado'])){ ?>
        <li><a href="/trabalho/fazerPostagem.php">Adicionar Postagem</a></li>
        <li><a href="/trabalho/alterarPessoa.php">Alterar Perfil</a></li>
        <li><a href="/trabalho/esqueceuSenha.php">Alterar Senha</a></li>
        <li>
            <div id="logout">
                <form action="includes/logica/logica_pessoa.php" method="post">
                    <button type="submit" name="sair" class="sair"> Sair </button>
                </form>
                <div>
        </li>
        <?php }?>
        </ul>
</nav>
<script src="assets/js/validacao.js"></script>
</body>
</html>