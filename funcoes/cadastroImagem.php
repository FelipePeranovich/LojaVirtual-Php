<?php
include_once ("../funcoes/banco.php");

$url = filter_input(INPUT_POST,"url",FILTER_SANITIZE_SPECIAL_CHARS);
$id_prod = filter_input(INPUT_POST,"nomeProduto",FILTER_SANITIZE_SPECIAL_CHARS);

$bd = conectar();
$sql = "INSERT INTO imagem (id_imagem, url_imagem, fk_Produtos_id_produto) values "
. "(NULL, '$url', '$id_prod')";

$bd->beginTransaction();

    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
    }

$bd = null;
header("../adm/produto.php");
?>