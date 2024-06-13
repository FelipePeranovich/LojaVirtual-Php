<?php
include_once'../funcoes/banco.php';
$bd = conectar();

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$cpf = filter_input(INPUT_POST,"cpf",FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,"cep",FILTER_SANITIZE_SPECIAL_CHARS);
$numero = filter_input(INPUT_POST,"numero",FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST,"id_cliente",FILTER_SANITIZE_SPECIAL_CHARS);

$select = "select *from clientes where id_cliente = $id";
$cosulta = $bd->query($select);
$resultado = $cosulta->fetch();
$old_email = $resultado['email_cliente'];

$sql = "UPDATE `clientes` SET `nm_cliente`='$nome',`cpf_cliente`='$cpf'".
    ",`telefone`='$telefone',`cep`='$cep',`nro`='$numero',`email_cliente`='$email' WHERE id_cliente = $id";
    $verifica_email = "select * from clientes where email_cliente = '$email'";
    $teste = $bd->query($verifica_email);
    if($teste -> rowCount()!=0){
        if($email != $old_email){
        echo "<script>alert('EMAIL INVÁLIDO! ESSE EMAIL JÁ POSSUI CADASTRO');javascript:history.go(-1)</script>";
        die();
        }
    }
    $bd->beginTransaction();
    $i = $bd->exec($sql);  
        if ($i != 1){
            $bd->rollBack();
        }
    else {
        session_start();
        $_SESSION['usuario'] = $nome;
        $_SESSION['permissao'] = "usuario";
        $_SESSION['cpf'] = $cpf;
        $bd->commit();       
        header("location:../telas/usuario.php");
    }
$bd = null;
?>