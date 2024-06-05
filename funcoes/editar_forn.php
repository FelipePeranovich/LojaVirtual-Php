<?php
include_once ("../funcoes/banco.php");
try{
    $bd = conectar();
    $bd->beginTransaction();

$id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nome",FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST,"cnpj",FILTER_SANITIZE_SPECIAL_CHARS);
$atv = filter_input(INPUT_POST,"atv",FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,"cep",FILTER_SANITIZE_SPECIAL_CHARS);
$nro = filter_input(INPUT_POST,"nro",FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = "UPDATE fornecedor SET nm_fornecedor='$nome', cnpj_fornecedor='$cnpj', atividade_fornecedor='$atv', cep_fornecedor	='$cep',nro_fornecedor='$nro',telefone_fornecedor='$telefone' WHERE id_fornecedor='$id'";
$stmt = $bd->prepare($consulta);
$stmt->execute();
$bd->commit();
}
catch (Exception $e){
    $bd->rollback();
    $bd=null;
    die();
  }
header("location:../adm/excluirfornecedor.php");