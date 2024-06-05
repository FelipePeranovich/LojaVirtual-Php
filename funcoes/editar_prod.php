<?php
include_once ("../funcoes/banco.php");
try{
    $bd = conectar();
    $bd->beginTransaction();

$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST,"valor",FILTER_SANITIZE_SPECIAL_CHARS);
$ds = filter_input(INPUT_POST,"ds",FILTER_SANITIZE_SPECIAL_CHARS);
$for = filter_input(INPUT_POST,"for",FILTER_SANITIZE_SPECIAL_CHARS);
$cat = filter_input(INPUT_POST,"cat",FILTER_SANITIZE_SPECIAL_CHARS);
$qtd = filter_input(INPUT_POST,"qtd",FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = "UPDATE produtos SET nm_produto='$nome', ds_produto='$ds', valor_prod='$valor', fk_Categorias_id_categoria ='$cat',fk_Fornecedor_id_fornecedor='$for', qtd_produto='$qtd' WHERE id_produto='$id'";
$stmt = $bd->prepare($consulta);
$stmt->execute();
$bd->commit();
}
catch (Exception $e){
    $bd->rollback();
    $bd=null;
    die();
  }
header("location:../adm/excluirproduto.php");