
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="6;url=pagina1.php"> <!-- Redireciona em 6 segundos para a página pagina1.php -->
    <title>Bem-vindo</title>
    <style>
        body { /*css do corpo da página*/
            display: flex; 
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: OCR A Std, monospace;
            background-color: #ffff;
        }
        h1 { /*adiciona o efeito FadeIn ao "H1", assim como modifica a cor,tamanho e posição do texto*/
            font-size: 2cm;
            color: #000;
            margin-top:-60px;
            opacity: 0;
            animation: fadeIn 5s ease-in-out forwards;
            }
             @keyframes fadeIn {
                to {
                opacity: 1;
                     }
            }
</style>
    </style>
</head>
<body>
<h1>BEM-VINDO!</h1>
</body>
</html>
