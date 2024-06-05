<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$consulta = "select * from produtos p join categorias c on p.fk_Categorias_id_categoria = c.id_categoria join fornecedor f on p.fk_Fornecedor_id_fornecedor = f.id_fornecedor order by p.id_produto";
$resultado = $bd->query($consulta);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Produtos - Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
   <!-- JavaScript -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="../telas/index.php"><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../adm/produto.php" >Cadastro produto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/fornecedor.php" >Cadastro fornecedor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirproduto.php" id="ativo">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirfornecedor.php" >Fornecedores</a>
      </li>

</nav>
<div class=""><table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Fornecedor</th> 
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($prod = $resultado->fetch()){
                echo "<tr>";
                    echo "<td>".$prod["nm_produto"]."</td>";
                    echo "<td>".$prod["nm_categoria"]."</td>";
                    echo "<td>".$prod["nm_fornecedor"]."</td>";
                    echo "<td>".$prod["qtd_produto"]."</td>";
                    echo "<td><a href='../funcoes/deleteProduto.php?id_produto=".$prod['id_produto']."'><button class='btn btn-danger'>Excluir</button></a>";
                    echo "<td><a href='../adm/editarProduto.php?id_produto=".$prod['id_produto']."'><button class='btn btn-primary'>Editar</button></a></td>";
                echo "</tr>";
                
            }
            $resultado = null;
            $bd = null;
        ?>
        </tbody>
    </table>
        </div>

</body>
</html>