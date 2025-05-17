

<?php 

    if(isset($_POST['enviar']))
    {

    //trecho utilizado apenas para verificar se está funcionando
    //print_r($_POST['desc']); 
    //print_r('<br>');    
    //print_r($_POST['Marca']);
    //print_r('<br>');    
    //print_r($_POST['quantidade']);
    //print_r('<br>');    
    //print_r($_POST['Preço']);
    //print_r('<br>');    
    //print_r($_POST['Val']);

    include_once('CONFIG.php');

    $desc = $_POST['desc']; // inclui a descrição inserida no site ao banco de dados
    $marca = $_POST['Marca']; // inclui a marca inserida no site ao banco de dados
    $quantidade = $_POST['quantidade']; // inclui a quantidade inserida no site ao banco de dados
    $preço = $_POST['Preço']; // inclui a preço inserida no site ao banco de dados
    $val = $_POST['Val']; // inclui a descrição inserida no site ao banco de dados

    if (!empty($desc) || !empty($marca) || !empty($quantidade) || !empty($preço) || !empty($val)) //verifica se ao menos um campo foi preenchido

    $result = mysqli_query($conexao, "INSERT INTO produtos(nome, marca, quantidade, preco, validade)
    VALUES ('$desc', '$marca', '$quantidade', '$preço', '$val')"); //repassa tudo ao banco de dados

    if ($result) {
        header("Location: pagina2.php?status=sucesso");
        exit();
    } else {
        header("Location: pagina2.php?status=erro");
        exit();
    }
    }
?>
<!doctype html> <!-- Base do HTML e Inclusão do bootstrap -->
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
  <style>
    body { /*css do corpo da página*/
        display: center;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding-top: 100px;
    }
    .container { /*css do container principal da página */
     max-width: 650px; 
     width: 100%;
     padding: 10px;
     background-color: rgb(248, 248, 248);
     border-radius: 5px;
     box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /*cria uma borda sombreada envolta do container*/
    }
    .pagina { /*css dos elementos dentro do container(inclusos na classe "pagina"), permitindo alinhar as caixas de inserção de texto e adicionar espaçamento entre elas*/
        display:flex;
        gap: 20px;
    }
    .it { /*define para todos os elementos da classe "it" cor de texto preta, alinhamento conforme o display*/
    color:black;
    display: flex;
    flex-direction: column;
    flex: 1;
    margin-bottom: 15px;
        }
    .it input { /*seleciona todos os elementos "input" da classe "it" e modifica a fonte e tamanho*/
    width: 100%;
    padding: 5px;
    font-size: 14px;
        }
    .it label { /*seleciona os "labels" e alinha-os ao centro*/
        text-align: center;
    }
    .it label p { /*seleciona todos os <p> dentro dos "labels" e alinha-os ao centro*/
        margin-bottom: 5px; 
    }
    .it input:hover { /*escurece as caixas de texto levemente ao passar o mouse por cima*/
    background-color: rgb(245, 245, 245);
    }
    input::placeholder { /*modifica a cor das letras que ficam no fundo das caixas de texto*/
        color: rgb(49, 48, 48);
        opacity: 1;
    }
    </style>
  <body>
    <?php
        if (isset($_GET['status'])) { 
    if ($_GET['status'] === 'sucesso') {
        echo "<div class='alert alert-success'>Informações enviadas com sucesso!</div>"; //gera o alerta de sucesso ao enviar o produto
    } elseif ($_GET['status'] === 'erro') {
        echo "<div class='alert alert-danger'>Erro ao enviar as informações.</div>"; //gera o alerta de erro ao enviar o produto
    }
    }
?>
    <main class="container">
    <form action="pagina2.php" method="POST">
        <h1></h1> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <p></p> 
    <div class="pagina">
        <div class="it">
            <label for="desc">Descrição:
            <input placeholder="Descrição do Produto" type="text" name="desc"> <!-- possibilita inserir a descrição do produto no site -->
            </label>
        </div>
    </div>

        <p></p>

    <div class="pagina">
        <div class="it"> 
            <label for="Marca">Marca:
            <input placeholder="Marca do Produto" type="text" name="Marca"> <!-- possibilita inserir a marca do produto no site -->
            </label>
        </div>
        <div class="it">
            <label for="quantidade">Quantidade disponível:
            <input placeholder="Quantidade" type="number" id="quantidade" name="quantidade" min="0" max="10000" /> <!-- possibilita inserir a quantidade do produto no site -->
            </label>
        </div>
    </div>

    <div class="pagina">
        <div class="it">
            <label for="Preço">Valor Unitário:
            <input placeholder="R$ 0,00" type="number" id="Preço" name="Preço" step="0.01" min="0.00"   > <!-- possibilita inserir o preço do produto no site -->
            </label>
        </div>
        <div class="it">
            <label for="Val">Validade:
            <input placeholder="validade" type="date" name="Val">  <!-- possibilita inserir a validade do produto no site -->
            </label>
        </div>
    </div>
         <style>  /*Modifica a posição do botão "enviar" e cria o efeito "hover" que ao passar o mouse nele o mesmo escurecerá levemente */
            .btn-primary{ 
                margin-top: 10px;
                margin-left: 270px;
            }              
            .btn-primary:hover {
                background-color: rgb(0, 0, 150) !important;
                 }
        </style>
            <input type="submit" name="enviar" class="btn btn-primary" style="font-size: 18px; padding: 10px 20px;"> <!-- cria o botão "enviar", do tipo "submit" -->
        </div>
    </div>
    </form> 
    </main>
</body>
</html>