<?php
include_once ("../funcoes/banco.php");

ini_set("upload_file_max", "50M");

if (isset($_FILES["arquivo"])) {

    $arquivo = $_FILES["arquivo"];
    $diretorio = "imagens/";
    $nome = $arquivo["name"];
    $nome_tmp = $arquivo["tmp_name"];
    $tamanho = $arquivo["size"];
    $erro = $arquivo["error"];    
}
$id_prod = filter_input(INPUT_POST,"nomeProduto",FILTER_SANITIZE_SPECIAL_CHARS);

$bd = conectar();
$sql = "INSERT INTO imagem (id_imagem, url_imagem, fk_Produtos_id_produto) values "
. "(NULL, '../imagens/$nome', '$id_prod')";

$bd->beginTransaction();

    $i = $bd->exec($sql);
    
    if ($i != 1){
        $bd->rollBack();
    }
    else {
        $bd->commit();
    }

$bd = null;
header("location:../adm/produto.php")
?>