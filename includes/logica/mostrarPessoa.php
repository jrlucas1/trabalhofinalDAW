<!DOCTYPE html>
<html>

<?php
include_once('includes/logica/funcoes_produto.php');
include_once('includes/logica/conecta.php');
?>
   <title>Listar Produto</title>
</head>
<body>  
<body>

<main>
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
                    <p>Email <?php echo $produto['descricao']; ?></p>
                    <p>CPF: <?php echo $produto['quantidade']; ?></p>
                    <br><br>                                                          
                </section>
            <?php
        }
    }
    ?>
</main>
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