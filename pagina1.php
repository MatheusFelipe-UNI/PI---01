<?php

include_once('CONFIG.php');

$Sql = "SELECT * FROM produtos ORDER BY id ASC"; //seleciona os dados do banco de dados, ordenados pela id

    $result = $conexao->query($Sql);

?>

<!doctype html> <!-- INCLUSÃO DO BOOTSTRAP !-->
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CONTROLE DE ESTOQUE</title>
    <div style= "background-color:rgb(245, 245, 245); display: flex; justify-content: center; gap:50px; padding: 10px 20px;"> <!-- dentro da div inclui o estilo do fundo da página, alinhamento dos itens, cria espaçamento e tamanho dos botões  -->
    <style>
        .btn-cadastro:hover { /*Cria o efeito "hover" no botão cadastro*/
    background-color: rgb(0, 0, 150) !important;
        }
    </style> <!-- estilo do botão "cadastro" e seu redirecionamento -->
    <a href="pagina2.php" class="btn-cadastro" style="
        text-decoration: none;
        color: #ffff;
        background-color:rgb(0, 110, 255);
        padding: 5px 10px;
        border-radius: 3px;
        font-weight: 700;
        font-family: 'Segoe UI', sans-serif;
        margin: 0 8px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        border: 2px solid ;">
        CADASTRO
    </a>
    <style>
        .btn-cesta:hover { /*Cria o efeito "hover" no botão cesta*/
    background-color: rgb(0, 0, 150) !important;
        }
    </style> <!-- estilo do botão "gerar cesta" e seu redirecionamento -->
    <a href="criar_cesta.php" class="btn-cesta" style="
        text-decoration: none;
        color: #ffff;
        background-color:rgb(0, 110, 255);
        padding: 5px 10px;
        border-radius: 3px;
        font-weight: 700;
        font-family: 'Segoe UI', sans-serif;
        margin: 0 8px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        border: 2px solid ;">
        GERAR CESTA
    </a>
    <style>
        .btn-rela:hover { /*Cria o efeito "hover" no botão relatório*/
    background-color: rgb(0, 0, 150) !important;
        }
    </style> <!-- estilo do botão "relatório" e seu redirecionamento --> 
    <a href="rela.php" class="btn-rela" style="
        text-decoration: none;
        color: #ffff;
        background-color:rgb(0, 110, 255);
        padding: 5px 10px;
        border-radius: 3px;
        font-weight: 700;
        font-family: 'Segoe UI', sans-serif;
        margin: 0 8px;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        border: 2px solid ;">
        RELATÓRIO
    </a>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">

            <?php //cria a mensagem de sucesso, após exito na criação de uma cesta
        session_start();

        if (isset($_SESSION['mensagem_sucesso'])) {
            echo "<div style='background: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px;'>
                    " . $_SESSION['mensagem_sucesso'] . "
                </div>";
            unset($_SESSION['mensagem_sucesso']); 
        }
        ?>
                            

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
        <p></p> 
    <main class = "container">
    <h1></h1>
    <p></p>
    <div style="text-align:center;">
        <h1> Produtos Já Cadastrados: </h1>
    </div>
    <br></br>
    <div>
        <table class="table table-striped"> <!-- TABELA QUE ORDENARÁ OS ITENS !-->
        <thead>
            <tr>
            <th scope="col">ID</th> <!-- CAMPO DA ID !-->
            <th scope="col">Produtos</th> <!-- CAMPO DO NOME !-->
            <th scope="col">Marca</th> <!-- CAMPO DA MARCA !-->
            <th scope="col">Quantidade</th> <!-- CAMPO DA QUANTIDADE !-->
            <th scope="col">Preço</th> <!-- CAMPO DO PREÇO !-->
            <th scope="col">Validade</th> <!-- CAMPO DA VALIDADE !-->
            <th scope="col">Editar/Excluir</th> <!-- CAMPO PARA BOTÃO DE EDIÇÃO !-->
            </tr>
        </thead>
        <tbody>
            <?php
                while($itens = mysqli_fetch_assoc($result)) //FUNÇÃO PHP PARA EXIBIR OS ITENS EM SEUS RESPECTIVOS CAMPOS
                {
                    echo "<tr>";
                    echo "<td>".$itens['id']."</td>";
                    echo "<td>".$itens['nome']."</td>";
                    echo "<td>".$itens['marca']."</td>";
                    echo "<td>".$itens['quantidade']."</td>";
                    echo "<td>".$itens['preco']."</td>";
                    echo "<td>".date("d-m-Y", strtotime($itens['validade']))."</td>";
                    echo "<td style='text-align: left;'>
                        <a class = 'btn btn-sm btn-primary' href='editar.php?id=$itens[id]'> 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/>
                            </svg>
                        </a>
                        <a class='btn btn-sm btn-danger' href='deletar.php?id=$itens[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                            </svg>
                        </a>
                    </td>";
                    echo "<tr>";
                }
            ?>
        </tbody>
        </table>
    </div>
</main>
</body>
</html>