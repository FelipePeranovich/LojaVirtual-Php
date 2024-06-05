<?php
include_once ("../funcoes/banco.php");
try{
    $bd = conectar();
    $bd->beginTransaction();

$id = filter_input(INPUT_POST,"id_produto",FILTER_SANITIZE_SPECIAL_CHARS);
$url = filter_input(INPUT_POST,"url",FILTER_SANITIZE_SPECIAL_CHARS);



$consulta = "UPDATE imagem SET url_imagem='$url'WHERE fk_Produtos_id_produto='$id'";
$stmt = $bd->prepare($consulta);
$stmt->execute();
$bd->commit();
}
catch (Exception $e){
    $bd->rollback();
    $bd=null;
    die();
  }
header("location:../adm/imagens.php");