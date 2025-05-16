<?php
session_start();
if(isset($_POST["salvar_cesta"])) {
    include_once('CONFIG.php');

    // Validar e limpar os dados
    $nomecesta = mysqli_real_escape_string($conexao, $_POST['nome_cesta']);
    $produtos_ids = $_POST['produtos_ids'];
    $quantidades = $_POST['quantidades'];

    // Iniciar transação para garantir integridade dos dados
    mysqli_begin_transaction($conexao);

    try {
        // 1. Inserir a cesta e obter o ID
        $sql_cesta = "INSERT INTO cestas (nome) VALUES ('$nomecesta')";
        if(!mysqli_query($conexao, $sql_cesta)) {
            throw new Exception("Erro ao criar cesta: " . mysqli_error($conexao));
        }
        $cesta_id = mysqli_insert_id($conexao);

        // 2. Processar cada item da cesta
        for($i = 0; $i < count($produtos_ids); $i++) {
            $produto_id = intval($produtos_ids[$i]);
            $quantidade = intval($quantidades[$i]);
            
            // Só processa se quantidade for maior que 0
            if($quantidade > 0) {
                // 2.1. Verificar se há estoque suficiente
                $sql_estoque = "SELECT quantidade FROM produtos WHERE id = $produto_id FOR UPDATE";
                $result = mysqli_query($conexao, $sql_estoque);
                $estoque = mysqli_fetch_assoc($result)['quantidade'];
                
                if($estoque < $quantidade) {
                    throw new Exception("Estoque insuficiente para o produto ID $produto_id");
                }

                // 2.2. Inserir item na cesta
                $sql_item = "INSERT INTO cesta_itens (cesta_id, produto_id, quantidade) 
                            VALUES ($cesta_id, $produto_id, $quantidade)";
                if(!mysqli_query($conexao, $sql_item)) {
                    throw new Exception("Erro ao adicionar item: " . mysqli_error($conexao));
                }

                // 2.3. Atualizar estoque do produto
                $sql_update = "UPDATE produtos SET quantidade = quantidade - $quantidade 
                               WHERE id = $produto_id";
                if(!mysqli_query($conexao, $sql_update)) {
                    throw new Exception("Erro ao atualizar estoque: " . mysqli_error($conexao));
                }
            }
        }

        
        mysqli_commit($conexao);
        $_SESSION['mensagem_sucesso'] = "Cesta criada com sucesso!";
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        // Em caso de erro, desfazer todas as operações
        mysqli_rollback($conexao);
        echo "Erro: " . $e->getMessage();
        // Você pode redirecionar para uma página de erro ou mostrar a mensagem
    }
}
?>