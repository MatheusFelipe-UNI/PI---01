<?php 

    if(!empty($_GET['id']))
    {

    include_once('CONFIG.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM produtos WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if($result->num_rows > 0)
    {
        while($itens = mysqli_fetch_assoc($result)) //pega todos os campos inseridos no cadastro e os trás devolta, permitindo editar
        {
            $desc = $itens['nome']; 
            $marca = $itens['marca']; 
            $quantidade = $itens['quantidade']; 
            $preço = $itens['preco']; 
            $val = $itens['validade']; 
        }
    
    }
    else
    {
        header('Location: pagina1.php');
    }
    }


?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CADASTRO DE PRODUTO</title>
     <a href="pagina1.php" class="btn btn-sm btn-danger" style="position:absolute; top: 10px; left: 10px;" > 
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
        </svg> 
    </a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <style> /*basicamente o mesmo style da pagina2.php*/
       body {
        display: center;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding-top: 100px;
    }
    .container {
     max-width: 650px; 
     width: 100%;
     padding: 10px;
     background-color: rgb(248, 248, 248);
     border-radius: 5px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .pagina {
        display:flex;
        gap: 20px;
    }
    .it {
    color:black;
    display: flex;
    flex-direction: column;
    flex: 1;
    margin-bottom: 15px;
        }
    .it label { 
    text-align: center;
    }
    .it label p {
    margin-bottom: 5px; 
    }
    .it input {
    width: 100%;
    padding: 5px;
    font-size: 14px;
        }
    .it input:hover {
    background-color: rgb(245, 245, 245);
    }
    input::placeholder {
        color: rgb(49, 48, 48);
        opacity: 1;
    }
    </style>
  <body>
    <main class="container">
    <form action="Save.php" method="POST">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <p></p> 
    <div class="pagina">
        <div class="it">
            <label for="desc">Descrição:
            <input placeholder="Descrição do Produto" type="text" id="desc" name="desc" value="<?php echo $desc ?>" > <!-- descrição do produto -->
            </label>
        </div>
    </div>

        <p></p>
    <div class="pagina">
        <div class="it"> 
            <label for="Marca">Marca:
            <input placeholder="Marca do Produto" type="text" id="marca" name="marca" value="<?php echo $marca ?>" > <!-- marca do produto -->
            </label>
        </div>
        <div class="it">
            <label for="quantidade">Quantidade disponível:
            <input placeholder="Quantidade" type="number" id="quantidade" name="quantidade" min="0" max="10000" value="<?php echo $quantidade ?>" >  <!-- quantidade do produto -->
            </label>
        </div>
    </div>

    <div class="pagina">
        <div class="it">
            <label for="Preço">Valor Unitário:
            <input placeholder="R$ 0,00" type="number" id="Preço" name="Preço" step="0.01" min="0.00" value="<?php echo $preço ?>" > <!-- valor do produto -->
            </label>
        </div>
        <div class="it">
            <label for="Val">Validade:
            <input placeholder="validade" type="date" name="Val" id="Val" value="<?php echo $val ?>" >  <!-- validade do produto -->
            </label>
        </div>
    </div>
            <input type="hidden" name= "id" value="<?php echo $id ?>"> <!-- inclui a id do produto, mas de forma escondida -->
            <input type="submit" name="Atualizar" id= "Atualizar" value="Atualizar" class="btn btn-primary" style="font-size: 18px; padding: 10px 20px;">  <!-- cria o botão "atualizar", do tipo "submit" -->
            <style>
                .btn-primary{
                margin-top: 10px;
                margin-left: 260px;
                }
                .btn-primary:hover {
            background-color: rgb(0, 0, 150) !important;
                }
            </style>
        </div>
    </form> 
    </main>

</body>
</html>