<?php
    include_once '../funcoes/banco.php';
    $bd = conectar();
    session_start();
    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST,"pass",FILTER_SANITIZE_SPECIAL_CHARS);
    
    $sql = "SELECT nm_cliente,email_cliente,senha_cliente FROM `clientes` WHERE email_cliente='$email'";
    $resultado = $bd->query($sql);
        
    $login = $resultado->fetch();
    $senha_bd = $login['senha_cliente'];
    if(password_verify($senha, $senha_bd)){
        $_SESSION['usuario'] = $login['nm_cliente'];
        $_SESSION['permissao'] = "usuario";
        header("location:../telas/index.php");
    }else{
        unset($_SESSION["usuario"]);
        unset($_SESSION["permissao"]);
    }  
$resultado = null;
$bd = null;    