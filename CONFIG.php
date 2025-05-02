<?php
// faz a conexão da página com o banco de dados
    $dbhost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'cestasbasicas';

    $conexao = new mysqli($dbhost,$dbUsername,$dbPassword,$dbName);

    //if($conexao->connect_errno)
    //{
    //    echo "Erro";
    //}
    //else
    //{
    //    echo "conexão correta";
    //}
?>