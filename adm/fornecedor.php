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
        <a class="nav-link" href="../adm/produto.php" >Cadastro produto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../adm/fornecedor.php" id="ativo" >Cadastro fornecedor</a>
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
            <form id="fornecedorForm" method="post" action="processar_cadastro_fornecedor.php">
                <div class="form-group">
                    <label for="nomeFornecedor">Nome do Fornecedor:</label>
                    <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="cnpjFornecedor">CNPJ:</label>
                    <input type="text" class="form-control" id="cnpjFornecedor" name="cnpjFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="atividadeFornecedor">Atividade:</label>
                    <input type="text" class="form-control" id="atividadeFornecedor" name="atividadeFornecedor" required>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Lado Direito -->
                <div class="form-group">
                    <label for="cepFornecedor">CEP:</label>
                    <input type="text" class="form-control" id="cepFornecedor" name="cepFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="numeroFornecedor">Número:</label>
                    <input type="text" class="form-control" id="numeroFornecedor" name="numeroFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="telefoneFornecedor">Telefone:</label>
                    <input type="text" class="form-control" id="telefoneFornecedor" name="telefoneFornecedor" required>
                </div>
            </div>
        </div>
        <!-- Botões de Enviar e Limpar -->
        <div class="col-md-12 text-center mt-3"> 
            <button type="submit" class="btn btn-primary" style="background-color: rgba(11, 47, 88, 0.95)">Enviar</button>
            <button type="button" class="btn btn-danger" onclick="limparCampos()">Cancelar</button>
        </div>
    </form>
</div>

<script>
    function limparCampos() {
        document.getElementById("fornecedorForm").reset();
    }
</script>

</body>
</html>