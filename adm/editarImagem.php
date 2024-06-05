<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$id = filter_input(INPUT_GET,"id_imagem",FILTER_SANITIZE_SPECIAL_CHARS);
$consulta = "select * from imagem i join produtos p on p.id_produto = i.fk_Produtos_id_produto join categorias c on p.fk_Categorias_id_categoria = c.id_categoria join fornecedor f on p.fk_Fornecedor_id_fornecedor = f.id_fornecedor where id_imagem = '$id'";
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
    <form method="POST" action="../funcoes/editar_img.php">
        <div>
            <label>ID</label>
            <input type="text" name="id" readonly value="<?=$for['id_imagem']?>">
            <label>ID Produto</label>
            <input type="text" name="id_produto" readonly value="<?=$for['id_produto']?>">
            <label>Produto</label>
            <input type="text" name="produto" readonly value="<?=$for['nm_produto']?>">
            <label>Categoria</label>
            <input type="text" name="cat" readonly value="<?=$for['nm_categoria']?>">
            <label>Fornecedor</label>
            <input type="text" name="for" readonly value="<?=$for['nm_fornecedor']?>">
            <label>Url</label>
            <input type="text" name="url" value="<?=$for['url_imagem']?>">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>