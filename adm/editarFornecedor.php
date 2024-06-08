<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$id = filter_input(INPUT_GET,"id_fornecedor",FILTER_SANITIZE_SPECIAL_CHARS);
$consulta = "select * from fornecedor where id_fornecedor = '$id'";
$resultado = $bd->query($consulta);
if($resultado->rowCount()==0){
    
    $bd =  null;
    header("location:index.php");
    die();
}else{
    $for = $resultado->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditarFornecedor</title>
</head>
<body>
    <form method="POST" action="../funcoes/editar_forn.php">
        <div>
            <label>ID</label>
            <input type="text" name="id"  value="<?=$for['id_fornecedor']?>">
            <label>Nome</label>
            <input type="text" name="nome" value="<?=$for['nm_fornecedor']?>">
            <label>CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" maxlength="18" value="<?=$for['cnpj_fornecedor']?>">
            <label>Atividade</label>
            <input type="text" name="atv" value="<?=$for['atividade_fornecedor']?>">
            <label>CEP</label>
            <input type="text" name="cep" value="<?=$for['cep_fornecedor']?>" maxlength="9" onkeyup="handleZipCode(event)" >
            <label>Número</label>
            <input type="text" name="nro" value="<?=$for['nro_fornecedor']?>">
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?=$for['telefone_fornecedor']?>" maxlength="15" onkeyup="handlePhone(event)">
            <input type="submit" value="Enviar">
        </div>
    </form>
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
</script>
</body>
</html>