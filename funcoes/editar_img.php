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

try{
    $bd = conectar();
    $bd->beginTransaction();

$id = filter_input(INPUT_POST,"nomeProduto",FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = "UPDATE imagem SET url_imagem='../imagens/$nome'WHERE fk_Produtos_id_produto='$id'";

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