<!DOCTYPE html>
<?php
    include_once'../funcoes/banco.php';
    $bd = conectar();
    session_start();
    $cpf = $_SESSION['cpf'];
    $consulta = "SELECT * FROM clientes where cpf_cliente = '$cpf'";
    $i = $bd->query($consulta);
    $id = $i ->fetch();
    $id_cliente = $id['id_cliente'];
    $select ="SELECT * FROM compra where fk_Clientes_id_cliente = $id_cliente";
    $resultado = $bd->query($select);
?>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AtletaShop</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
  <link rel="stylesheet" href="../estilo/home.css">
  <!-- JavaScript -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="../telas/index.php" ><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
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
        <a class="nav-link" href="../telas/conjuntos.php">Conjunto</a>
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
    echo '<a class="navbar-carrinho" href="#" id="btnloginCarrinho"><img class="d-inline-block align-top" id="alert-icon" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>'; 
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

<div class="container mt-4">
    <div class="row">
        <!-- Coluna dos produtos no carrinho -->
        <div class="col-md-8">
            <h2>Suas Compras</h2>
            <!-- Lista de produtos no carrinho -->
            <?php                    
            if($resultado->rowCount()==0){
                echo '<h5 class="card-title">Nenhuma compra!</h5>';         
            }else{
              while($res = $resultado->fetch()){ 
                $valores_json = $res['id_itens_comprados'];
                $valores = json_encode($valores_json,true);  
                $valor = trim($valores, '"[,]"');
                            $ids = explode(",",$valor);
                                        
            echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo  '<div class="row">';
                            echo '<div class="col-md-6">';
                            echo '<h5 class="card-title">Data da compra: '.$res['dt_compra'].'</h5>';
                            echo '<p class="card-text">Valor da Compra: R$'.$res['valor_compra'].'</p>'; 
                            echo '<p class="card-text">Podutos:</p>';                         
                            foreach($ids as $o){
                                $ids_produto = "select * from produtos where id_produto = $o";
                                $res_ids= $bd->query($ids_produto);
                                $produto = $res_ids->fetch();
                                echo $produto['nm_produto']."<br>";
                            }                          
                            echo '</div>';
                            echo '<div class="col-md-2">';   
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';                                     
                    echo '</div>';
                  }
            }
            ?>
            </div>
        <div class="col-md-4">
        <form action="../telas/EditPerfil.php" method="POST">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Perfil</h5>
                    <p>Nome: <?=$id['nm_cliente']?></p>
                    <p>Email: <?=$id['email_cliente']?></p>                    
                    <p>CPF: <?=$id['cpf_cliente']?></p>
                    <p>CEP: <?=$id['cep']?></p>
                    <h4></h4>
                    <input type="hidden" name="cpf" value="<?=$id['cpf_cliente']?>">
                    <button type="submit" class="btn btn-primary btn-block" id="btn-finalizar" style="background-color: rgba(11,47,88,0.95)">Editar Perfil</button>
                </div>
            </div>
            </form>
        </div> 
    </div>  
</div>