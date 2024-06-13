<!DOCTYPE html>
<?php
    include_once'../funcoes/banco.php';
    $bd = conectar();
    $cpf = filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "select * from clientes where cpf_cliente = '$cpf'";
    $consulta = $bd->query($sql);
    $res = $consulta->fetch();
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
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
<div class="container p-2">
    <form id="formulario" method="POST" action="../funcoes/EditarPerfil.php">
    <h3>Criar Conta</h3>
    <br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" value="<?=$res['email_cliente']?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputName">Nome</label>
            <input type="text" class="form-control" name="nome" id="name" value="<?=$res['nm_cliente']?>">
        </div>

    </div>
    <div class="form-row">   
    <div class="form-group col-md-6">
            <label for="inputTEL">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="<?=$res['telefone']?>" maxlength="15" onkeyup="handlePhone(event)" required>
        </div>  
        <div class="form-group col-md-6">
            <label for="inputcpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?=$res['cpf_cliente']?>" maxlength="14" readonly>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" value="<?=$res['cep']?>" maxlength="9" onkeyup="handleZipCode(event)" autofocus required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputNRO">Número</label>
            <input type="text" class="form-control" name="numero" id="nro"value="<?=$res['nro']?>">
        </div>
        <div class="form-row">
        <div class="form-group col-md-4">
            <label for="">Logradouro</label>
            <input type="text" readonly class="form-control" id="logradouro" value="">
        </div>
        <div class="form-group col-md-4 " >
            <label for="">Bairro</label>
            <input type="text" readonly class="form-control" id="bairro">
        </div>
        <div class="form-group col-md-3">
            <label for="">Cidade</label>
            <input type="text" readonly  class="form-control" id="cidade">
        </div>
        <div class="form-group col-md-1">
            <label for="">UF</label>
            <input type="text" readonly class="form-control"  id="uf">
        </div>
    </div>
      <input type="hidden" name="id_cliente"value="<?=$res['id_cliente']?>">
        <div class="col-md-12 text-center mt-3" >
            <button type="submit" class="btn btn-primary"id="bt-cadastrar" style="background-color: rgba(11,47,88,0.95)">Cadastrar</button>
            <button type="button" class="btn btn-danger" onclick="limparCampos()">Cancelar</button>
        </div>
        
    </form>
</div>
<script type="text/javascript">

    function limparCampos() {
        document.getElementById("formulario").reset();
    }

    const handleZipCode = (event) => {
    let input = event.target
    input.value = zipCodeMask(input.value)
    }

  const zipCodeMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{5})(\d)/,'$1-$2')
    return value
    }
  const input = document.getElementById("cpf");

  input.addEventListener("keyup", formatarCPF);

  function formatarCPF(e){
    var v=e.target.value.replace(/\D/g,"");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    e.target.value = v;
  } 
  const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
}
$("#cep").focusout(function(){
				
				var cep = this.value.replace(/[^0-9]/, "");
				
				
				if(cep.length != 8){
					return false;
				}
				
				
				var url = "https://viacep.com.br/ws/"+cep+"/json/";
				
			
				$.getJSON(url, function(dadosRetorno){
					try{
					
						$("#logradouro").val(dadosRetorno.logradouro);
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#uf").val(dadosRetorno.uf);
					}catch(ex){}
				});
			});
</script> 