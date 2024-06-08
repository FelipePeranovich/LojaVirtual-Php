<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AtletaShop</title>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../telas/chuteira.php" >Chuteiras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/bolas.php">Bolas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/camisas.php">Camisas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/conjuntos.php">Conjuntos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../telas/acessorios.php">Acessórios</a>
      </li>
    </ul>
    
  </div>
  <?php
  session_start();
  if(!empty($_SESSION["usuario"])){
    echo'<a class="navbar-carrinho" href="carrinho.php" id="btn-carrinho"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>';
  }else{
    echo '<a class="navbar-carrinho" href="#" id="btnlogin"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>'; 
  }
    ?>
    <form class="form-inline my-2 my-lg-0 navbar-form">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Pesquisar</button>
    </form>
    <?php
      if(!empty($_SESSION["usuario"])){            
        echo '<a class="navbar-logado p-3"  id="icone-logado" href="#"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/iconelogado.png" alt="perfil"></a>';
        echo '<h8 class="d-inline-block align-top" style="color:#fff">'.$_SESSION["usuario"].'</h8>'.'<a class ="nav-link" href="../funcoes/sair.php"><img class="d-inline-block align-top" width="20" height="20" src="../imagens/icon-sair.png" alt="sair"></a>';
      }else{
        echo '<button id="btnlogin" class="btn btn-outline-light my-2 my-sm-0 ml-2">Login</button>'; 
      }
    ?> 
</nav>

 <!-- Informacoes carrinho -->

<div class="container mt-4">
    <div class="row">
        <!-- Coluna dos produtos no carrinho -->
        <div class="col-md-8">
            <h2>Seu Carrinho</h2>
            <!-- Lista de produtos no carrinho -->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Imagem do produto -->
                            <img src="../imagens/chuteira1.jpg" alt="Produto" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <!-- Informações do produto -->
                            <h5 class="card-title">Nome do Produto</h5>
                            <p class="card-text">Descrição do produto...</p>
                        </div>
                        <div class="col-md-2">
                            <!-- Botão para excluir o produto do carrinho -->
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Repita esse bloco para cada produto no carrinho -->
        </div>
        <!-- Coluna do resumo do pedido e botão de finalizar compra -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumo do Pedido</h5>
                    <!-- Valor dos produtos -->
                    <p>Subtotal: R$ 100,00</p>
                    <!-- Valor do frete -->
                    <p>Frete: R$ 10,00</p>
                    <!-- Valor total -->
                    <h4>Total: R$ 110,00</h4>
                    <!-- Botão de finalizar compra -->
                    <button class="btn btn-primary btn-block" id="btn-finalizar" style="background-color: rgba(11,47,88,0.95)">Finalizar Compra</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
