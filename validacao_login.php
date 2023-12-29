<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

session_start();



// Banco de dados do sistema
$usuariosApp = array(
    array('id' => 1, 'email' => 'tiago@gmail.com', 'senha' => '1234', 'permissao' => 0),
    array('id' => 2, 'email' => 'matheusruiz@gmail.com', 'senha' => '1234', 'permissao' => 0),
    array('id' => 3, 'email' => 'lucaspatins@gmail.com', 'senha' => '1234', 'permissao' => 0),
    array('id' => 4, 'email' => 'adm@gmail.com', 'senha' => '1234', 'permissao' => 1)
);


$email = $_POST['email'];
$senha = $_POST['senha'];
$usuarioAutentificado = false;
$usuarioId = null;
$usuarioPermissao = null;

foreach ($usuariosApp as $usuarioApp) {
    if ($usuarioApp['email'] === $email && $usuarioApp['senha'] === $senha) {
        $usuarioAutentificado = true;
        $usuarioId = $usuarioApp['id'];
        $usuarioPermissao = $usuarioApp['permissao'];
    }
}

if ($usuarioAutentificado) {
    $_SESSION['autentificado'] = 'sim';
    $_SESSION['id_usuario'] = $usuarioId;
    $_SESSION['permissao_usuario'] = $usuarioPermissao; 
    header('Location: home.php');
} else {
    $_SESSION['autentificado'] = 'nao';
    header('Location: index.php?autentificado=invalido');
}

?>

<body>
    <?php
    if ($usuarioAutentificado) {

    ?>
        <h2>Dados do Usuário</h2>
        <p>
            <strong>E-mail: </strong>
            <?php echo $email ?>
        </p>
        <p>
            <strong>Senha: </strong>
            <?php echo $senha; ?>
        </p>
        <script>
            alert('Validação Concluída');
        </script>
    <? } else {
        header('Location: index.php?autentificado=nao');
    }
    ?>
</body>

</html>