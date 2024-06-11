<?php
include_once'../funcoes/banco.php';
$bd = conectar();
session_start();
$cpf = $_SESSION['cpf'];
$id = filter_input(INPUT_POST,"produto",FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST,"quantidade",FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST,"valor");

$verificaID = "select id_cliente from clientes where cpf_cliente = '$cpf'";
$respota = $bd->query($verificaID);
$resp = $respota->fetch();
$id_cliente = $resp['id_cliente'];

$sql="INSERT INTO `carrinho`(`quantidade`, `valor`, `id_carrinho`, `fk_Produtos_id_produto`, `fk_Clientes_id_cliente`) VALUES ('$quantidade','$valor','null','$id','$id_cliente')";

$bd->beginTransaction();
    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        session_start();
        $_SESSION['id_produto'] = $id;
        $_SESSION['quantidade'] = $quantidade;
        $_SESSION['valor'] = $valor;
        $bd->commit();
    }

$consulta = "select nm_categoria from categorias c join produtos p on p.fk_Categorias_id_categoria=c.id_categoria where p.id_produto='$id'";
$resultado = $bd->query($consulta);
$res = $resultado->fetch();
$pagina= $res['nm_categoria'];
$bd = null;
header("location:../telas/$pagina.php");