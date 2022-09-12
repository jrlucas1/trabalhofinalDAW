<link rel="stylesheet" href="assets/css/index.css">
<title>Login</title>
</head>
<body>
<?php require('includes/componentes/header.php'); session_start();
?>
<main>
<h1> Login </h1>
    <section>
    <form action="includes/logica/logica_pessoa.php" method="POST" >
      <div class="form-group"> 
      	<label for="email">Email: </label><input type="text" name="email" id="email" >
      </div>
      <div class="form-group"> 
      	<label for="senha">Senha: </label><input type="password" name="senha" id="senha">
      </div>

      <p><button type="submit" id='entrar' name='entrar' value="Entrar" class="btn btn-primary"> Entrar </button></p>      
    </form> 
    <br>
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