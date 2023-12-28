<?php
session_start();
if (!isset($_SESSION['autentificado']) || $_SESSION['autentificado'] !== 'sim') {
    header('Location: index.php?autentificado=invalido');
}
