<?php
 
    function fazerPostagem ($conexao,$array){
       try {
            $query = $conexao->prepare("insert into postagem (idpessoa, data, horariosaida, horariochegada, preco, idcarro, conteudo, cep, bairro, logradouro) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $resultado = $query->execute($array);
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

function buscarPostagem($conexao,$array){
        try {
        $query = $conexao->prepare("select * from postagem where id = ?");
        if($query->execute($array)){
            $postagem = $query->fetch();
            return $postagem;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }
}
function listarPostagem($conexao){
      try {
        $query = $conexao->prepare("select * from postagem");      
        $query->execute();
        $postagens = $query->fetchAll();
        return $postagens;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
 }
 function pesquisarPostagemPorNomePessoa($conexao,$array){
        try {
        $query = $conexao->prepare("select * from postagem JOIN pessoas ON (pessoas.id = postagem.idpessoa) where pessoas.nome like ?");
        if($query->execute($array)){
            $postagens = $query->fetchAll();
          if ($postagens)
            {  
                return $postagens;
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
function updatePostagem($conexao, $array){
    try{
        $query = $conexao->prepare("UPDATE postagem SET  data=?, horariosaida=?, horariochegada=?, preco=?, idcarro=?, conteudo=?, cep=?, bairro=?, logradouro=? WHERE id=?");
        $resultado = $query->execute($array);

        return $resultado;
    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
    }
}    
    function deletarPostagem($conexao, $array){
    try{
        $query = $conexao->prepare("DELETE FROM postagem WHERE id=?");
        $resultado = $query->execute($array);

        return $resultado;
    } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
    }
}

   ?>
?>