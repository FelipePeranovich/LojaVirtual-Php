<?php
include_once ("../funcoes/banco.php");

$bd = conectar();
$bd->beginTransaction();

$id = filter_input(INPUT_GET,"id_fornecedor",FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = "DELETE FROM fornecedor WHERE id_fornecedor = ?";
$stmt = $bd->prepare($consulta);
$stmt->execute([$id]);
$bd->commit();
$bd=null;
header("location:../adm/excluirfornecedor.php");