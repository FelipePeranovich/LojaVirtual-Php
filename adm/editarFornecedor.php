<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$id = filter_input(INPUT_GET,"id_fornecedor",FILTER_SANITIZE_SPECIAL_CHARS);
$consulta = "select * from fornecedor where id_fornecedor = '$id'";
$resultado = $bd->query($consulta);
if($resultado->rowCount()==0){
    
    $bd =  null;
    header("location:index.php");
    die();
}else{
    $for = $resultado->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="editar_forn.php">
        <div>
            <label>ID</label>
            <input type="text" name="id"  value="<?=$for['id_fornecedor']?>">
            <label>Nome</label>
            <input type="text" name="nome" value="<?=$for['nm_fornecedor']?>">
            <label>CNPJ</label>
            <input type="text" name="cnpj" value="<?=$for['cnpj_fornecedor']?>">
            <label>Atividade</label>
            <input type="text" name="atv" value="<?=$for['atividade_fornecedor']?>">
            <label>CEP</label>
            <input type="text" name="cep" value="<?=$for['cep_fornecedor']?>">
            <label>Número</label>
            <input type="text" name="nro" value="<?=$for['nro_fornecedor']?>">
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?=$for['telefone_fornecedor']?>">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>