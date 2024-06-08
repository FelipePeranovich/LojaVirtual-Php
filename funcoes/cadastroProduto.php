<?php
include_once '../funcoes/banco.php';
ini_set("upload_file_max", "50M");

if (isset($_FILES["arquivo"])) {
    $arquivo = $_FILES["arquivo"];
    $url = $arquivo["name"]; 
}

$ds_produto = filter_input(INPUT_POST,"descricaoProduto",FILTER_SANITIZE_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST,"valorProduto",FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST,"nomeProduto",FILTER_SANITIZE_SPECIAL_CHARS);
$idcategoria = filter_input(INPUT_POST,"tipoProduto");
$idfornecedor = filter_input(INPUT_POST,"tipoFornecedor");
$qtd = filter_input(INPUT_POST,"quantidadeProduto",FILTER_SANITIZE_SPECIAL_CHARS);
$url = filter_input(INPUT_POST,"arquivo",FILTER_SANITIZE_SPECIAL_CHARS);

$bd = conectar();
$sql = "INSERT INTO produtos (id_produto, ds_produto, valor_prod, nm_produto, fk_Categorias_id_categoria, fk_Fornecedor_id_fornecedor, qtd_produto,url_imagem) values "
. "(NULL, '$ds_produto', '$valor', '$nome', '$idcategoria', '$idfornecedor' , '$qtd', '../imagens/$url')";

$bd->beginTransaction();
    $i = $bd->exec($sql);    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
    }

$bd = null;
header("location:../adm/produto.php");
?>