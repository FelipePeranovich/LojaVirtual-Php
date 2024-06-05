<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$id = filter_input(INPUT_GET,"id_produto",FILTER_SANITIZE_SPECIAL_CHARS);
$consulta = "select * from produtos p where p.id_produto = '$id'";
$resultado = $bd->query($consulta);
if($resultado->rowCount()==0){
    
    $bd =  null;
    header("location:index.php");
    die();
}else{
    $prod = $resultado->fetch();
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
    <form method="POST" action="../funcoes/editar_prod.php">
        <div>
            <label>ID</label>
            <input type="text" name="id"  value="<?=$prod['id_produto']?>">
            <label>Nome</label>
            <input type="text" name="nome" value="<?=$prod['nm_produto']?>">
            <label>Valor</label>
            <input type="text" name="valor" value="<?=$prod['valor_prod']?>">
            <label>Descrição</label>
            <input type="text" name="ds" value="<?=$prod['ds_produto']?>">
            <label>Fornecedor</label>
            <select name="for">
                <?php
                $consulta3= "select * from fornecedor order by id_fornecedor";
                $resultado3 = $bd->query($consulta3);
                while($for = $resultado3->fetch()){
                echo "<option value=".$for['id_fornecedor'].">".$for['nm_fornecedor']."</option>";
                }
            ?>
            </select>
            <label>Categoria</label>
            <select name="cat">
             <?php
                $consulta2 = "select * from categorias order by id_categoria";
                $resultado2 = $bd->query($consulta2);
                while($cat = $resultado2->fetch()){
                echo "<option value=".$cat['id_categoria'].">".$cat['nm_categoria']."</option>";
                }
            ?>
            </select>
            <label>Quantidade</label>
            <input type="text" name="qtd" value="<?=$prod['qtd_produto']?>">
            <input type="submit" value="Enviar">
        </div>
    </form>
</body>
</html>