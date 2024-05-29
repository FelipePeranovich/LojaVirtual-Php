<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    header("location:../telas/index.php")
?>