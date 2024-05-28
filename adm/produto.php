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
  <a class="navbar-brand" href=""><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
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
    
    <div class="row">
        <div class="col-md-6">
            <!-- Lado Esquerdo -->
            <form id="produtoForm" method="post" action="processar_cadastro.php">
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto:</label>
                    <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" required>
                </div>
                <div class="form-group">
                    <label for="descricaoProduto">Descrição do Produto:</label>
                    <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" rows="3" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Lado Direito -->
                <div class="form-group">
                    <label for="valorProduto">Valor do Produto (R$):</label>
                    <input type="number" step="0.01" class="form-control" id="valorProduto" name="valorProduto" required>
                </div>
                <div class="form-group">
                    <label for="quantidadeProduto">Quantidade do Produto:</label>
                    <input type="number" class="form-control" id="quantidadeProduto" name="quantidadeProduto" required min="1">
                </div>
                <div class="form-group">
                    <label for="tipoProduto">Tipo do Produto:</label>
                    <select class="form-control" id="tipoProduto" name="tipoProduto">
                        <option value="1">Tipo 1</option>
                        <option value="2">Tipo 2</option>
                        <option value="3">Tipo 3</option>
                        <!-- Adicione mais opções conforme necessário -->
                    </select>
                </div>
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



