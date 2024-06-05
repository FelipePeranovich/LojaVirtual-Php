<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$consulta = "select * from produtos p join imagem i on p.id_produto = i.fk_Produtos_id_produto join categorias c on p.fk_Categorias_id_categoria = c.id_categoria join fornecedor f on p.fk_Fornecedor_id_fornecedor = f.id_fornecedor";
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
        <a class="nav-link" href="../adm/excluirproduto.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirfornecedor.php" id="ativo" >Fornecedores</a>
      </li>

</nav>
  <br>
    <a href="produto.php"><button type="button">Voltar</button></a>
  <br>
<div class="ontainer mt-4 p-3"><table>
        <thead>
            <tr>
                <th>Id Produto</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Fornecedor</th>
                <th>Url</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($img = $resultado->fetch()){
                echo "<tr>";
                    echo "<td>".$img["id_produto"]."</td>";
                    echo "<td>".$img["nm_produto"]."</td>";
                    echo "<td>".$img["nm_categoria"]."</td>";
                    echo "<td>".$img["nm_fornecedor"]."</td>";
                    echo "<td>".$img["url_imagem"]."</td>";
                    echo "<td><a href='../adm/editarImagem.php?id_imagem=".$img['id_imagem']."'><button class='btn btn-primary'>Editar</button></a></td>";
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