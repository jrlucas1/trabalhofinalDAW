<link rel="stylesheet" href="assets/css/index.css">
<title>Login</title>
</head>
<body>
<?php require('includes/componentes/header.php'); session_start();
?>
<main>


    <section>
    <div id="login">
    <h1> Login </h1>  

    <form action="includes/logica/logica_pessoa.php" method="POST" >
    <label for="email">Email </label><input type="text" name="email" id="email" > <br>
    <label for="senha">Senha </label><input type="password" name="senha" id="senha"><br>
    <button type="submit" id='entrar' name='entrar' value="Entrar" class="btn btn-primary"> Entrar </button>
    </form> 
 

    </div>
    
    
    
    <div id="mensagem">
    	<?php
        if(isset($_SESSION['msg'])){
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