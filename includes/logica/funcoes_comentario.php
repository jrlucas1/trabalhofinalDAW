<?php
 
    function fazerComentario($conexao,$array){
       try {
            $query = $conexao->prepare("insert into comentarios (idpessoa, idpostagem, data, conteudo) values (?, ?, ?, ?)");

            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

function buscarComentario($conexao,$array){
        try {
        $query = $conexao->prepare("select * from comentarios where id = ?");
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
function listarComentarios($conexao, $array){
      try {
        $query = $conexao->prepare("select * from comentarios where idpostagem = ?");      
        $query->execute($array);
        $postagens = $query->fetch();
        return $postagens;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
 }

function updateComentarios($conexao, $array){
    try{
        $query = $conexao->prepare("UPDATE comentarios SET conteudo = ?  WHERE id=?");
        $resultado = $query->execute($array);

        return $resultado;
    }catch(PDOException $e){
        echo 'Error: ' . $e->getMessage();
    }
}    
    function deletarPostagem($conexao, $array){
    try{
        $query = $conexao->prepare("DELETE FROM comentarios WHERE id=?");
        $resultado = $query->execute($array)

        return $resultado;
    } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
    }
}

   ?>
?>