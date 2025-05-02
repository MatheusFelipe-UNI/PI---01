<?php 

    if(!empty($_GET['id']))
    {

    include_once('CONFIG.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($itens = mysqli_fetch_assoc($result))
        {
            $desc = $itens['nome']; // inclui a descrição inserida no site ao banco de dados
            $marca = $itens['marca']; // inclui a marca inserida no site ao banco de dados
            $quantidade = $itens['quantidade']; // inclui a quantidade inserida no site ao banco de dados
            $preço = $itens['preco']; // inclui a preço inserida no site ao banco de dados
            $val = $itens['validade']; // inclui a descrição inserida no site ao banco de dados
        }
    
    }
    else
    {
        header('Location: pagina1.php');
    }
    }


?>
<!-- estrutura básica do html-->
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONTROLE DE ESTOQUE</title>
    <a href="Save.php"> INICIO </a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
    <form action="Save.php" method="POST">
        <h1>CONTROLE DE ESTOQUE PARA CESTAS BASICAS</h1> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <p></p> 
<!-- estrutura básica do html-->

        <div class="it">
            <label>
            <p> Descreva o Produto: </p>
            <input placeholder="Descrição do Produto" type="text" id="desc" name="desc" value="<?php echo $desc ?>" required> <!-- possibilita inserir a descrição do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it"> 
            <label>
            <p> Insira a Marca do Produto: </p>
            <input placeholder="Marca do Produto" type="text" id="marca" name="marca" value="<?php echo $marca ?>" required> <!-- possibilita inserir a marca do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Quantidade disponível: </p>
            <input placeholder="Quantidade" type="number" id="quantidade" name="quantidade" 
            min="0" max="10000" value="<?php echo $quantidade ?>" required>  <!-- possibilita inserir a quantidade do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Valor Unitário: </p>
            <input placeholder="R$ 0,00" type="number" id="Preço" name="Preço" step="0.01" value="<?php echo $preço ?>" required> <!-- possibilita inserir o preço do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Validade: </p>
            <input placeholder="validade" type="date" name="Val" id="Val" value="<?php echo $val ?>" required>  <!-- possibilita inserir a validade do produto no site -->
            </label>
            <p></p>
            <input type="hidden" name= "id" value="<?php echo $id ?>">
            <input type="submit" name="Atualizar" id= "Atualizar"> <!-- cria o botão "enviar", do tipo "submit" -->
        </div>
    </form> 
    </main>

</body>
</html>