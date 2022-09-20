<html>
<link rel="stylesheet" href="assets/css/index.css">
<nav id="menu">
        <ul id="listaMenu">
                <li id="item1"><a href="/trabalho/index.php">Página Inicial</a></li>
                <li id="item2"><a href="/trabalho/fazerPostagem.php">Adicionar Postagem</a></li>
                <li id="item3"><a href="/trabalho/alterarPessoa.php">Alterar Perfil</a></li>
                <li id="item4"><a href="/trabalho/esqueceuSenha.php">Alterar senha </a></li>                                   
                <div id="logout">
                        <span> Usuário Logado:  <?php echo $_SESSION['nome'];?>  </span>  
                        <form action="includes/logica/logica_pessoa.php" method="post">
                                <button type="submit" name="sair"> Sair </button>
                        </form>
                <div>    
        </li>
        </ul>
</nav>
</html>
