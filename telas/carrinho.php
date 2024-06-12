<!DOCTYPE html>
<?php
  include_once ("../funcoes/banco.php");
  $bd = conectar();
  session_start();
  //localiza o cliente
  if(empty($_SESSION['usuario'])){
    header("location:../telas/index.php");
  }
  $cpf = $_SESSION['cpf'];
  $verificaID = "select id_cliente,cep from clientes where cpf_cliente = '$cpf'";
  $respota = $bd->query($verificaID);
  $resp = $respota->fetch();
  $id_cliente = $resp['id_cliente'];
  //busca os item no carrinho desse cliente
  $consulta ="SELECT * from carrinho c join produtos p  on c.fk_Produtos_id_produto=p.id_produto join fornecedor f on p.fk_Fornecedor_id_fornecedor=f.id_fornecedor where c.fk_Clientes_id_cliente=$id_cliente";
  $resultado = $bd->query($consulta);
  //soma o sub total dos pordutos selecionados
  $verifica ='SELECT SUM(quantidade * valor) as total from carrinho WHERE fk_Clientes_id_cliente= '.$resp['id_cliente'].'';
  $somar = $bd->query($verifica);
  $total = $somar->fetch();
  //informações do remuso do pedido
  $subtotal = $total['total'];
  $fretevalor = 10;
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
  if(!empty($_SESSION["usuario"])){
    echo'<a class="navbar-carrinho" href="carrinho.php" id="btn-carrinho"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>';
  }else{
    echo '<a class="navbar-carrinho" href="#" id="btnlogin"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>'; 
  }
    ?>
    <form class="form-inline my-2 my-lg-0 navbar-form" method="post" action="../funcoes/pesquisar.php">
      <input class="form-control mr-sm-2" type="search" name="pesquisa" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Pesquisar</button>
    </form>
    <?php
      if(!empty($_SESSION["usuario"])){            
        echo '<a class="navbar-logado p-3"  id="icone-logado" href="#"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/iconelogado.png" alt="perfil"></a>';
        echo '<h8 class="d-inline-block align-top" style="color:#fff">'.$_SESSION["usuario"].'</h8>'.'<a class ="nav-link" href="../funcoes/sair.php"><img class="d-inline-block align-top" width="20" height="20" src="../imagens/icon-sair.png" title="sair"></a>';
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
             <?php                    
              if($resultado->rowCount()==0){
                echo '<h5 class="card-title">Carrinho Vazio!</h5>';    
                $fretevalor = 0;       

            }else{
              while($res = $resultado->fetch()){
                $valorProd = $res['valor']; 
                $qtdProd = $res['quantidade'];
                $totalProd = $valorProd * $qtdProd; 
                      
            echo '<div class="card mb-3">';
            
                echo '<form action="../funcoes/excluiItemCarrinho.php" method="POST">';
                echo '<div class="card-body">';
                echo  '<div class="row">';
                echo    '<div class="col-md-2">';              
                            echo '<a href=../telas/produto.php?id_produto='.$res['id_produto'].'><img src="'.$res['url_imagem'].'" alt="Produto" class="img-fluid"></a>';
                            echo '</div>';
                            echo '<div class="col-md-6">';
                            echo '<h5 class="card-title">'.$res['nm_produto'].'</h5>';
                            echo '<p class="card-text">'.$res['ds_produto'].'</p>';
                            echo '<p class="card-text">Quantidade: '. $res['quantidade'].'</p>';
                            echo '<p class="card-text">Valor do produto: R$ '.$totalProd.'</p>';
                            echo '<p class="card-text">Vendido por: '. $res['nm_fornecedor'].'</p>';
                            echo '</div>';
                            echo '<div class="col-md-2">';   
                            echo '<input type="hidden" name="id_carrinho" value="'.$res['id_carrinho'].'">';  
                    echo '<input type="image" src="../imagens/botao-x.png" title="Remover item" alt="Submit" style="max-widht:32px; max-height:32px;">';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';                 
                    echo '</form>';
                    
                    echo '</div>';
                  }
            }
            ?>
            
        </div>
        <!-- Coluna do resumo do pedido e botão de finalizar compra -->
       
        <div class="col-md-4">
        <form action="../funcoes/finalizaCompra.php" method="POST">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Resumo do Pedido</h5>
                    <!-- Valor dos produtos -->
                    <p>Subtotal: R$ <?=$subtotal?></p>
                    <!-- Valor do frete -->
                    <p>Frete: R$ <?=$fretevalor?></p>
                    <!-- Valor total -->
                    <h4>Total: R$ <?=$valorfinal = $subtotal + $fretevalor;?></h4>
                    <!-- Botão de finalizar compra -->
                     <?='<input type="hidden" name="id_cliente" value="'.$id_cliente.'">';?>
                     <?='<input type="hidden" name="frete" value="'.$fretevalor.'">';?>
                     <?='<input type="hidden" name="valorfinal" value="'.$valorfinal.'">';?>
                    <?php
                    if($resultado->rowCount()==0){
                      echo'<button type="button" class="btn btn-primary btn-block" id="compra" style="background-color: rgba(11,47,88,0.95)">Finalizar Compra</button>';
                    }else{
                      echo'<button type="submit" class="btn btn-primary btn-block" id="btn-finalizar" style="background-color: rgba(11,47,88,0.95)">Finalizar Compra</button>';
                    }
                    ?>
                </div>
            </div>
            </form>
        </div> 
    </div>  
</div>
<script>
  var alerta = document.getElementById('compra');
alerta.addEventListener('click',function(){
  alert('Nenhum produto no carrinho!')
} )
</script>
</body>
