<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro fornecedor - Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
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
  <a class="navbar-brand" href="../telas/index.php"><img style="width:70px" src="../imagens/LogoAtletaShop.png"></a>
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
    <form id="fornecedorForm" method="post" action="../funcoes/cadastroFornecedor.php">
        <div class="row">
            <div class="col-md-6">
            <!-- Lado Esquerdo -->
                <div class="form-group">
                    <label for="nomeFornecedor">Nome do Fornecedor:</label>
                    <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="cnpjFornecedor">CNPJ:</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="18" placeholder="12.345.678/0002-00" required>
                </div>
                <div class="form-group">
                    <label for="atividadeFornecedor">Atividade:</label>
                    <input type="text" class="form-control" id="atividadeFornecedor" name="atividadeFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="">Cidade</label>
                    <input type="text" readonly  class="form-control" id="cidade">
                </div>
                <div class="form-group">
                    <label for="">UF</label>
                    <input type="text" readonly class="form-control"  id="uf">
            </div>
            </div>
            <div class="col-md-6">
                <!-- Lado Direito -->
                <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" placeholder="12345-678" maxlength="9" onkeyup="handleZipCode(event)" autofocus required>
                </div>
                <div class="form-group">
                    <label for="numeroFornecedor">Número:</label>
                    <input type="text" class="form-control" id="numeroFornecedor" name="numeroFornecedor" required>
                </div>
                <div class="form-group">
                    <label for="telefoneFornecedor">Telefone:</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone para contato" maxlength="15" onkeyup="handlePhone(event)" required>
                </div>
                <div class="form-group">
                    <label for="">Logradouro</label>
                    <input type="text" readonly class="form-control" id="logradouro" value="">
                </div>
                <div class="form-group" >
                    <label for="">Bairro</label>
                    <input type="text" readonly class="form-control" id="bairro">
                </div>
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

<script type="text/javascript">

    function limparCampos() {
        document.getElementById("formulario").reset();
    }
    function mascaraCNPJ(cnpj) {
    cnpj = cnpj.replace(/\D/g, ""); // Remove tudo o que não é dígito
    cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2"); // Coloca o ponto entre o segundo e o terceiro dígitos
    cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3"); // Coloca o ponto entre o quinto e o sexto dígitos
    cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2"); // Coloca a barra entre o oitavo e o nono dígitos
    cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2"); // Coloca o hífen entre o décimo segundo e o décimo terceiro dígitos
    return cnpj;
}

document.getElementById('cnpj').addEventListener('input', function (e) {
    e.target.value = mascaraCNPJ(e.target.value);
});
    
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
</html>