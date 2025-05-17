<?php
include_once('CONFIG.php');

// Consulta para pegar todas as cestas
$sql_cestas = "SELECT * FROM cestas ORDER BY id DESC";
$result_cestas = $conexao->query($sql_cestas);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório de Cestas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-4">
        <h1 class="mb-4">Relatório de Cestas Básicas</h1>
        
        <?php while($cesta = mysqli_fetch_assoc($result_cestas)): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Cesta #<?= $cesta['id'] ?> - <?= htmlspecialchars($cesta['nome']) ?></h2>
                </div>
                <div class="card-body">
                    <h3>Itens da Cesta:</h3>
                    
                    <?php
                    // Consulta para pegar os itens desta cesta específica
                    $sql_itens = "SELECT p.nome, p.marca, p.preco, ci.quantidade 
                                 FROM cesta_itens ci
                                 JOIN produtos p ON ci.produto_id = p.id
                                 WHERE ci.cesta_id = " . $cesta['id'];
                    $result_itens = $conexao->query($sql_itens);
                    ?>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Marca</th>
                                <th>Preço Unitário</th>
                                <th>Quantidade</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total_cesta = 0;
                            while($item = mysqli_fetch_assoc($result_itens)): 
                                $subtotal = $item['preco'] * $item['quantidade'];
                                $total_cesta += $subtotal;
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($item['nome']) ?></td>
                                    <td><?= htmlspecialchars($item['marca']) ?></td>
                                    <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                    <td><?= $item['quantidade'] ?></td>
                                    <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-end">Total da Cesta:</th>
                                <th>R$ <?= number_format($total_cesta, 2, ',', '.') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    Criada em: <?= date('d/m/Y H:i', strtotime($cesta['data_criacao'])) ?>
                </div>
            </div>
        <?php endwhile; ?>
        
        <a href="pagina1.php" class="btn btn-primary mt-3">Voltar</a>
        <button class="btn btn-primary mt-3" onclick="window.print()">Imprimir relatório</button>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>