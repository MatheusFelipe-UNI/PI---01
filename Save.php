<?php

include_once('CONFIG.php');

if(isset($_POST['Atualizar']))
{
    $id = $_POST['id'];
    $desc = $_POST['desc']; // inclui a descrição inserida no site ao banco de dados
    $marca = $_POST ['marca']; // inclui a marca inserida no site ao banco de dados
    $quantidade = $_POST ['quantidade']; // inclui a quantidade inserida no site ao banco de dados
    $preço = $_POST ['Preço']; // inclui a preço inserida no site ao banco de dados
    $val = $_POST ['Val']; // inclui a descrição inserida no site ao banco de dados

    $sqlUpdate = "UPDATE produtos SET nome='$desc',marca= '$marca' ,quantidade= '$quantidade' ,preco='$preço' ,validade='$val'
    WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location: pagina1.php');

?>