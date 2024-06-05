<?php
    include_once '../funcoes/banco.php';
    $bd = conectar();
    $consulta = "select * from produtos p join categorias c on c.id_categoria = p.fk_Categorias_id_categoria join fornecedor f on f.id_fornecedor = p.fk_Fornecedor_id_fornecedor order by id_produto";
    $resultado = $bd->query($consulta);
    $img = $resultado->fetch();
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
        <a class="nav-link" href="../adm/produto.php" id="ativo">Cadastro produto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/fornecedor.php" >Cadastro fornecedor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirproduto.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/excluirfornecedor.php" >Fornecedores</a>
      </li>

</nav>
</nav>

<div class="container mt-4">
<br>
    <a href="produto.php"><button type="button">Voltar</button></a>
  <br>
    <div class="row">
        <div class="col-md-6">
            <!-- Lado Esquerdo -->
            <form id="imagemForm" method="post" action="../funcoes/cadastroImagem.php">
                <div class="form-group">
                <label for="nomeProduto">Produto:</label>
                <select class="form-control" id="nomeProduto" name="nomeProduto">
                    <option value=""></option>
                    <?php
                while($prod = $resultado->fetch()){
                echo "<option value=".$prod["id_produto"].">".$prod['nm_produto']."</option>";
                 }
                 $resultado = null;
                 $bd = null;
                    ?> 
                </select>
                <br>
                <div class="form-group">
                    <label>Url</label>
                    <input type="text" name="url" value="">
                </div>
        </div>
        <!-- Botões de Enviar e Limpar -->
        <div class="col-md-12 text-center mt-3"> 
            <button type="submit" class="btn btn-primary" style="background-color: rgba(11, 47, 88, 0.95)" >Enviar</button>
            <button type="button" class="btn btn-danger" onclick="limparCampos()">Cancelar</button>
        </div>
    </form> 
</div>

<script>
    function limparCampos() {
        document.getElementById("produtoForm").reset();
    }
</script>

</body>
</html>