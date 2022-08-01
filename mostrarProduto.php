<!DOCTYPE html>
<html>

<?php
include_once('includes/componentes/cabecalho.php');
include_once('includes/componentes/header.php');
include_once('includes/logica/funcoes_produto.php');
?>
<title>Listar Produto</title>
</head>
<body>  
<body>

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
         <h3> Pesquisa de Usuários </h3>
    <?php
        if(empty($produtos)){
            ?>
                <section>
                    <p>Não há produtos cadastrados.</p>
                </section>
            <?php
        }
        else
        {
        foreach($produtos as $produto){
                 
            ?>
                <section>
                <p>Nome: <?php echo $produto['nome']; ?></p>
				<p>Descricao: <?php echo $produto['descricao']; ?></p>
				<p>Quantidade: <?php echo $produto['quantidade']; ?></p>
				<p>Categoria: <?php echo $produto['idcategoria']; ?></p>
                    
                    <form action="/exemplo_funcoes_PDO/includes/logica/logica_pessoa.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $produto['idproduto']; ?>" class ="btn btn-primary"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $produto['idproduto']; ?>" onclick = "return confirma_excluir()" class ="btn btn-primary"> Deletar </button> 
                    </form>
                    <br><br>                                                          
                </section>
            <?php
        }
           }
    ?>
</main>
<?php require('includes/componentes/footer.php');?>
</body>
<script type="text/javascript">
    function confirma_excluir()
    {
        resp=confirm("Confirma Exclusão?")

        if (resp==true)
        {

            return true;
        }
        else
        {
            return false;

        }

    }

</script>
</html>