<?php 
include_once'../funcoes/banco.php';
$bd = conectar();
$id_carrinho = filter_input(INPUT_POST,"id_carrinho");

$sql ='DELETE from carrinho where id_carrinho = '.$id_carrinho.'';

$bd->beginTransaction();
    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
        echo "<script>javascript:history.go(-1)</script>";
    }