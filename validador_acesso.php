<?php
session_start();
echo $_SESSION['autentificado'];
if (!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] !== 'sim') {
    header('Location: index.php?autentificado=invalido');
}
