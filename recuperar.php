<h1>Alterar password</h1>
<?php
include_once('includes/logica/funcoes_pessoa.php');
include_once('includes/logica/conecta.php');
$email = $_GET['email'];
$chave = $_GET['conf'];

if (isset($_POST['novaSenha'])) {
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $array = array($email, $senha);
    $retorno = alterarPassword($conexao, $array);
    if ($retorno) {
        $_SESSION['msg'] = "Sua senha foi alterada";
        header("Location:login.php");
    } else {
        $_SESSION['msg'] = "Houve um problema a alterar a sua senha";
        header("Location:login.php");
    }
}


if (empty($_GET['email']) || empty($_GET['conf']))
    die('<p>Não é possível alterar a password: dados em falta</p>');

$array = array($email, $chave);
$resultado = checkConf($conexao, $array);

if ($resultado) {
    // os dados estão corretos: eliminar o pedido e permitir alterar a password
    deleteConf($conexao, $array);

    echo 'Sucesso! <br>
    <form method="post">
    <label for="senha">Digite sua nova senha: </label><input type="password" name="senha">
    <input type="submit" name="novaSenha" value="Enviar">';
} else {
    echo '<p>Não é possível alterar a password: dados incorretos</p>';
}

?>