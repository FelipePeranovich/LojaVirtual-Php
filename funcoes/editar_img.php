<?php
include_once ("../funcoes/banco.php");
ini_set("upload_file_max", "50M");

if (isset($_FILES["arquivo"])) {

    $arquivo = $_FILES["arquivo"];
    $nome = $arquivo["name"]; 
}

try{
    $bd = conectar();
    $bd->beginTransaction();

$id = filter_input(INPUT_POST,"nomeProduto",FILTER_SANITIZE_SPECIAL_CHARS);

$consulta = "UPDATE produtos SET url_imagem='../imagens/$nome'WHERE id_produto='$id'";

$stmt = $bd->prepare($consulta);
$stmt->execute();
$bd->commit();
}
catch (Exception $e){
    $bd->rollback();
  }
header("location:../adm/imagens.php");