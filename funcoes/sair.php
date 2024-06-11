<?php
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['permissao']);
    echo "<script>javascript:history.go(-1)</script>";
?>