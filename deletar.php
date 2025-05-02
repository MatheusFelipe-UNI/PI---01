<?php 
include_once('CONFIG.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta os dados do item
    $sqlSelect = "SELECT * FROM produtos WHERE id = $id";
    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();

        // Se o usuário já confirmou a exclusão
        if (isset($_POST['confirmar'])) {
            $sqlDelete = "DELETE FROM produtos WHERE id = $id";
            $conexao->query($sqlDelete);
            header('Location: index.php');
            exit;
        }

        // Se clicou em cancelar
        if (isset($_POST['cancelar'])) {
            header('Location: index.php');
            exit;
        }
    } else {
        echo "Item não encontrado.";
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="text-danger">Confirmar Exclusão</h2>
    <p>Você tem certeza que deseja excluir o item <strong><?= $item['nome'] ?></strong> (ID: <?= $item['id'] ?>)?</p>

    <form method="post">
        <button type="submit" name="confirmar" class="btn btn-danger">Sim, excluir</button>
        <button type="submit" name="cancelar" class="btn btn-secondary">Cancelar</button>
    </form>
</body>
</html>