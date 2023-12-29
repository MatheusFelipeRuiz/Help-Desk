<?php
require_once 'validador_acesso.php';
?>

<?php
$arquivo = fopen('chamados/chamado.txt', 'r');
$listaChamados = [];
while (!feof($arquivo)) {
  if (feof($arquivo)) {
    continue;
  }
  $registroJSON = fgets($arquivo);
  $listaChamados[] = json_decode($registroJSON);
}

fclose($arquivo)
?>
<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-consultar-chamado {
      padding: 30px 0 0 0;
      width: 100%;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
        <div class="card">
          <div class="card-header">
            Consulta de chamado
          </div>

          <div class="card-body">
            <?php
            foreach ($listaChamados as $chamado) {
              if($_SESSION['permissao_usuario'] !== 1 && ((int)$chamado->idusuario) !==  $_SESSION['id_usuario']){
                continue;
              }
            ?>
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"> <strong><?php echo $chamado->titulo;  ?></strong></h5>
                  <h6 class="card-subtitle mb-2 text-muted"> <?php echo $chamado->categoria   ?></h6>
                  <p class="card-text"><?php echo $chamado->descricao;  ?></p>

                </div>
              </div>
            <?php
            }
            ?>

            <div class="row mt-5">
              <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>