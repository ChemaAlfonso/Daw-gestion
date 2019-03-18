<?php
session_start();

unset($_SESSION['usuario']);
unset($_SESSION['logedin']);
unset($_SESSION['logstart']);
unset($_SESSION['contador']);

header('Location: ../index.php');
?>