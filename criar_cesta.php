<?php
include "CONFIG.php";

$Sql = "SELECT * FROM produtos";
$result = $conexao->query($Sql);
?>

<!doctype html> 
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRIAR CESTAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <form action="Save_cesta.php" method="post">
        <h2>Montar Nova Cesta</h2>
        <br>
        <div class="ce">
            <label>
            <input placeholder="NOME DA CESTA" type="text" name="nome_cesta" required> 
            </label>
            <p></p>
        </div>
        
        <div>
            <table class="table table-striped"> 
            <thead>
                <tr>
                <th scope="col">PRODUTOS</th> 
                <th scope="col">MARCA</th> 
                <th scope="col">ESTOQUE ATUAL</th> 
                <th scope="col">PREÇO</th> 
                <th scope="col">QUANTIDADE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($itens = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$itens['nome']."</td>";
                        echo "<td>".$itens['marca']."</td>";
                        echo "<td>".$itens['quantidade']."</td>";
                        echo "<td>".$itens['preco']."</td>";
                        echo "<td><input type='number' name='quantidades[]' min='0' max='".$itens['quantidade']."' value='0' class='form-control'></td>";
                        echo "<input type='hidden' name='produtos_ids[]' value='".$itens['id']."'>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
        <input type="submit" name="salvar_cesta" id="salvar_cesta" value="Salvar Cesta" class="btn btn-primary">
    </form>
    </main>
  </body>
</html>


