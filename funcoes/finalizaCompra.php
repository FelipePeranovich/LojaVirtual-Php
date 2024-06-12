<?php
    include_once '../funcoes/banco.php';
    $bd = conectar();
    $id_cliente = filter_input(INPUT_POST,"id_cliente",FILTER_SANITIZE_SPECIAL_CHARS);
    $frete = filter_input(INPUT_POST,"frete",FILTER_SANITIZE_SPECIAL_CHARS);
    $valorfinal = filter_input(INPUT_POST,"valorfinal",FILTER_SANITIZE_SPECIAL_CHARS);
    

    $consulta = "select * from carrinho where Fk_Clientes_id_cliente = $id_cliente";
    $resultado = $bd->query($consulta);
    $valores = array();

    while($produtos = $resultado->fetch()){
        $qtd = $produtos['quantidade'];
        $produto = $produtos['fk_Produtos_id_produto'];
        $valores[] = $produto;
        $consulta2 = "select * from produtos where id_produto = $produto";
        $resultado2 = $bd->query($consulta2);
        $quantidade = $resultado2->fetch();
        $qtd_prod = $quantidade['qtd_produto'];
        $sql = "UPDATE produtos set qtd_produto = $qtd_prod-$qtd where id_produto=$produto";
        $envia = $bd->query($sql);
        $salva = $envia->fetch();        
        }
    $exclui = "Delete from carrinho where fk_Clientes_id_cliente = $id_cliente";
    $executa = $bd ->query($exclui);
    $data = date("Y-m-d");
    $valores_json = json_encode($valores);
    $sql2 = "INSERT INTO `compra`(`id_compra`, `dt_compra`, `valor_frete`, `valor_compra`, `fk_Clientes_id_cliente`, `fk_Vendedor_id_vendedor`,`id_itens_comprados`)".
                        "VALUES (NULL,'$data',$frete,'$valorfinal'-'$frete','$id_cliente','1','$valores_json')";
    $salvacompra = $bd->query($sql2);
    echo "<script>alert('Sua compra foi finalizada com sucesso!');";
    echo "javascript:history.go(-1);</script>";
?>
