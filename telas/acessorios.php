<!DOCTYPE html>
<?php
  include_once ("../funcoes/banco.php");
  $bd = conectar();
  $consulta ="SELECT * from produtos where fk_Categorias_id_categoria=5";
  $resultado = $bd->query($consulta);   
?>
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
        <a class="nav-link" href="../telas/chuteira.php">Chuteiras</a>
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
        <a class="nav-link" href="../telas/acessorios.php"id="ativo">Acessórios</a>
      </li>
    </ul>
    
  </div>
  <?php
  session_start();
  if(!empty($_SESSION["usuario"])){
    echo'<a class="navbar-carrinho" href="carrinho.php" id="btn-carrinho"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>';
  }else{
    echo '<a class="navbar-carrinho" href="#" ><img class="d-inline-block align-top" id="alert-icon" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>'; 
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
<!--EXIBE OS  PORDUTOS-->
<div class="product-grid p-3">
<?php
  while($res = $resultado->fetch()){
    echo'<div class="product-card ">';
      echo "<a href='../telas/produto.php?id_produto=".$res['id_produto']."'>";
      echo '<form action="enviacarrinho.php" method="POST">';
      echo'<img  src="'.$res["url_imagem"].'" alt="">';
      echo '<p>'.$res["ds_produto"].'</p>';
      echo '<p class="price">'."R$".$res["valor_prod"].",00".'</p>';
      if($res["qtd_produto"] > 0){
      echo '<p>Quantidade: '.$res["qtd_produto"].'</p>';
      echo '<input type="submit" class="btn btn-primary" id="btn-addcarrinho" value="Adicionar ao Carrinho">';
    }else{
    echo '<p>ESGOTADO!</p>';
  }
    echo '</form>';
    echo '</a>';
    echo '</div>';
  }
?>
</div>
<!-- Login Form -->
<div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="loginModalLabel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../funcoes/login.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Endereço de email:</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
          </div>
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" class="form-control" name="pass" placeholder="Senha">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
        <p class="mt-3">Não tem cadastro? <a href="CriarCadastro.php" >Crie sua conta</a></p>
      </div>
    </div>
  </div>
</div>
<!-- Srcript Tela Modal Login -->
 <script>
  var modal = document.getElementById("loginModal");
  var btn = document.getElementById("btnlogin");
  var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    document.addEventListener('DOMContentLoaded', () => {
    const alertIcon = document.getElementById('alert-icon');

    alertIcon.addEventListener('click', () => {
        alert('Para acessar está função é necessario fazer o login!');
    });
});
 </script>
</body>
