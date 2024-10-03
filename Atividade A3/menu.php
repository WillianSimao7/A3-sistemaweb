<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            font-size: 2.5rem;
            color: red;
        }

        a {
            display: inline-block;
            margin: 15px 0;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem - vindo, <?php require('verifica.php'); echo $_SESSION["nome_usuario"]; ?></h1>
        <a href="anunciar.php">Criar Anúncio</a><br>
        <a href="anuncios.php">Anúncios</a><br>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>