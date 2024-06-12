<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    unset($_SESSION['cpf']);
    echo "<script>javascript:history.go(-1)</script>";
?>