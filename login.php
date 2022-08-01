<link rel="stylesheet" href="assets/css/index.css">
<title>Login</title>
</head>
<body>
<?php require('includes/componentes/header.php'); session_start();
?>
<main>
<h1> Login </h1>
    <section>
    <form action="includes/logica/logica_pessoa.php" method="post" class=".col-md-4 .col-md-offset-3">
      <div class="form-group"> 
      	<label for="email">Email: </label><input type="text" name="email" id="email" class="form-control">
      </div>
      <div class="form-group"> 
      	<label for="senha">Senha: </label><input type="password" name="senha" id="senha" class="form-control">
      </div>

      <p><button type="submit" id='entrar' name='entrar' value="Entrar" class="btn btn-primary""> Entrar </button></p>      
    </form> 
    <br>
    <div id="mensagem">
    	<?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>
    </div>
    </section>
</main>
</body>
</html>