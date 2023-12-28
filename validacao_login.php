<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

session_start();



// Banco de dados do sistem
$usuariosApp = array(
    array('email' => 'luisafernanda@gmail.com', 'senha' => '123456'),
    array('email' => 'matheusruiz@gmail.com', 'senha' => '1234'),
    array('email' => 'lucaspatins@gmail.com', 'senha' => '30865')
);


$email = $_POST['email'];
$senha = $_POST['senha'];
$usuarioAutentificado = false;

foreach ($usuariosApp as $usuarioApp) {
    if ($usuarioApp['email'] === $email && $usuarioApp['senha'] === $senha) {
        $usuarioAutentificado = true;
    }
}

if ($usuarioAutentificado) {
    $_SESSION['autentificado'] = 'sim';
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