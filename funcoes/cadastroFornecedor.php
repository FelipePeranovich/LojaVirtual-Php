<?php
include_once ("../funcoes/banco.php");

$nome = filter_input(INPUT_POST,"nomeFornecedor",FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj = filter_input(INPUT_POST,"cnpj",FILTER_SANITIZE_SPECIAL_CHARS);
$atv = filter_input(INPUT_POST,"atividadeFornecedor",FILTER_SANITIZE_SPECIAL_CHARS);
$cep = filter_input(INPUT_POST,"cep",FILTER_SANITIZE_SPECIAL_CHARS);
$nro = filter_input(INPUT_POST,"numeroFornecedor");
$telefone = filter_input(INPUT_POST,"telefone",FILTER_SANITIZE_SPECIAL_CHARS);

$bd = conectar();
$sql = "INSERT INTO fornecedor (id_fornecedor, nm_fornecedor, cnpj_fornecedor, atividade_fornecedor, cep_fornecedor, nro_fornecedor, telefone_fornecedor) values "
. "(NULL, '$nome', '$cnpj', '$atv', '$cep', $nro, '$telefone')";

$bd->beginTransaction();

    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
    }

$bd = null;
header("location:../adm/fornecedor.php");
?>