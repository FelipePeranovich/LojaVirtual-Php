<?php
include_once ("../funcoes/banco.php");
$bd = conectar();
$id = filter_input(INPUT_GET,"id_produto",FILTER_SANITIZE_SPECIAL_CHARS);
$consulta = "select * from produtos p join categorias c on p.fk_Categorias_id_categoria = c.id_categoria join fornecedor f on p.fk_Fornecedor_id_fornecedor = f.id_fornecedor where id_produto = '$id'";
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
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../estilo/styles.css">
  <link rel="stylesheet" href="../estilo/login.css">
</head>
<body>
<div class="container mt-4">
<br>
    <a href="imagens.php"><button type="button">Voltar</button></a>
  <br>
    <div class="row">
        <div class="col-md-6">
            <!-- Lado Esquerdo -->
            <form id="imagemForm" method="POST" action="../funcoes/editar_img.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nomeProduto">Produto:</label>
                <select class="form-control" id="nomeProduto" name="nomeProduto">
                <?php
                echo "<option value=".$for["id_produto"].">".$for['nm_produto']."</option>";
                 $resultado = null;
                 $bd = null;
                ?> 
                </select>
                <br>
                <?php
                echo'<label>Imagem Atual:</label>';
                echo'<br>';
                echo'<img  src="'.$for["url_imagem"].'" alt="">';
                ?>
                <br>
                <label for="arquivo">Carregue a nova imagem aqui:</label>
                <input type="file" id="fileInput" name="arquivo">
                <div id="image-container">
                    <span> Imagem será exibida aqui</span>
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
    //Código uploud imagem.
    const fileInput = document.getElementById('fileInput');
        const imageContainer = document.getElementById('image-container');

        let file;

        // Ao selecionar um arquivo
        fileInput.addEventListener('change', (event) => {
            file = event.target.files[0];
        });

        // Ao clicar fora do input de seleção
        document.addEventListener('click', (event) => {
            if (!fileInput.contains(event.target) && file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const img = document.createElement('img');
                    img.src = e.target.result;

                    // Limpa o container e adiciona a nova imagem
                    imageContainer.innerHTML = '';
                    imageContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
                file = null; // Reseta o arquivo para evitar múltiplos carregamentos
            }
        });

</script>
<style>
  #image-container {
            width: 150px;
            height: 150px;
            border: 2px dashed #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        #image-container img {
            max-width: 100%;
            max-height: 100%;
        }
</style>
</body>
</html>