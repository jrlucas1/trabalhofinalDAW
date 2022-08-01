<?php
 
    function inserirProduto($conexao,$array){
       try {
            $query = $conexao->prepare("insert into produtos (nome, descricao, quantidade, idcategoria) values (?, ?, ?, ?)");

            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

function buscarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produtos where idproduto = ?");
        if($query->execute($array)){
            $produto = $query->fetch();
            return $produto;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }
}
function listarProdutos($conexao){
      try {
        $query = $conexao->prepare("select * from produtos");      
        $query->execute();
        $produtos = $query->fetchAll();
        return $produtos;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
 }
 function pesquisarProduto($conexao,$array){
        try {
        $query = $conexao->prepare("select * from produtos where nome like ?");
        if($query->execute($array)){
            $produtos = $query->fetchAll();
          if ($produtos)
            {  
                return $produtos;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }
    
   ?>
?>