

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
        echo "Informações enviadas com sucesso!";
    } else {
        echo "Erro ao enviar as informações: " . mysqli_error($conexao);
    }
    } else {
        echo "Por favor, preencha todos os campos!";
    
    }
    
?>
<!-- estrutura básica do html-->
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONTROLE DE ESTOQUE</title>
    <a href="pagina1.php"> INICIO </a>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
    <form action="pagina2.php" method="POST">
        <h1>CONTROLE DE ESTOQUE PARA CESTAS BASICAS</h1> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <p></p> 
<!-- estrutura básica do html-->

        <div class="it">
            <label>
            <p> Descreva o Produto: </p>
            <input placeholder="Descrição do Produto" type="text" name="desc"> <!-- possibilita inserir a descrição do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it"> 
            <label>
            <p> Insira a Marca do Produto: </p>
            <input placeholder="Marca do Produto" type="text" name="Marca"> <!-- possibilita inserir a marca do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Quantidade disponível: </p>
            <input placeholder="Quantidade" type="number" id="quantidade" name="quantidade" 
            min="0" max="10000" /> <!-- possibilita inserir a quantidade do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Valor Unitário: </p>
            <input placeholder="R$ 0,00" type="number" id="Preço" name="Preço" step="0.01"> <!-- possibilita inserir o preço do produto no site -->
            </label>
            <p></p>
        </div>
        <div class="it">
            <label>
            <p> Validade: </p>
            <input placeholder="validade" type="date" name="Val">  <!-- possibilita inserir a validade do produto no site -->
            </label>
            <p></p>
            <input type="submit" name="enviar"> <!-- cria o botão "enviar", do tipo "submit" -->
        </div>
    </form> 
    </main>

</body>
</html>