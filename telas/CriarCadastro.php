<!DOCTYPE html>
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
  <a class="navbar-carrinho" href="carrinho.php" id="btn-carrinho"><img class="d-inline-block align-top" width="30" height="30" src="../imagens/carrinho.png" alt="carrinho"></a>
    <form class="form-inline my-2 my-lg-0 navbar-form">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-2" type="submit">Pesquisar</button>
    </form>
    <button id="btnlogin" class="btn btn-outline-light my-2 my-sm-0 ml-2">Login</button>
    
</nav>
<div class="container p-2">
    <form id="formulario" method="POST" action="../funcoes/cadastroUser.php">
    <h3>Criar Conta</h3>
    <br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Senha</label>
            <input type="password" class="form-control" name="senha" id="inputPassword4" placeholder="Senha" maxlength="14">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputName">Nome</label>
            <input type="text" class="form-control" name="nome" id="name" placeholder="Raphael Veiga Ferreira">
        </div>
        <div class="form-group col-md-6">
            <label for="inputcpf">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" placeholder="123.123.123-10" maxlength="14">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" id="cep" placeholder="12345-678" maxlength="9" onkeyup="handleZipCode(event)" autofocus>
        </div>
        <div class="form-group col-md-3 " >
            <label for="inputNRO">Número</label>
            <input type="text" class="form-control" name="numero" id="nro"placeholder="Número de casa, apartamento etc">
        </div>
        <div class="form-group col-md-6">
            <label for="inputTEL">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone para contato" maxlength="15" onkeyup="handlePhone(event)" >
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="">Logradouro</label>
            <input type="text" readonly class="form-control" id="logradouro" value="">
        </div>
        <div class="form-group col-md-3 " >
            <label for="">Bairro</label>
            <input type="text" readonly class="form-control" id="bairro">
        </div>
        <div class="form-group col-md-3">
            <label for="">Cidade</label>
            <input type="text" readonly  class="form-control" id="cidade">
        </div>
        <div class="form-group col-md-3">
            <label for="">UF</label>
            <input type="text" readonly class="form-control"  id="uf">
        </div>
    </div>
        <div class="col-md-12 text-center mt-3" >
            <button type="submit" class="btn btn-primary"id="bt-cadastrar" style="background-color: rgba(11,47,88,0.95)">Cadastrar</button>
            <button type="submit" class="btn btn-danger" id="bt-cancelar" >Cancelar</button>
        </div>
    </form>
</div>   
<script type="text/javascript">
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
</body>