<?php
session_start();
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST,"senha",FILTER_SANITIZE_SPECIAL_CHARS);
$cpf = filter_input(INPUT_POST,"cpf",FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,"cep",FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST,"numero",FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);

$senhaHash = password_hash($senha,PASSWORD_DEFAULT);
include_once '../funcoes/banco.php';
$bd = conectar();
$sql = "insert into clientes (id_cliente, nm_cliente, cpf_cliente, telefone, cep, nro, email_cliente, senha_cliente) values "
. "(NULL, '$nome', '$cpf', '$telefone', '$cep', $numero, '$email', '$senhaHash')";

$bd->beginTransaction();

    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
        $_SESSION['usuario'] = $login['nm_cliente'];
        $_SESSION['permissao'] = "usuario";
    }

$bd = null;
header("location:../telas/index.php");
?>
