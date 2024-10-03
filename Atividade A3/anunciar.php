<?php
include('config.php');

// Pede informações para criar anúncio e salva informações no banco de dados
if (@$_REQUEST['botao'] == "Anunciar") {
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $preco = $_POST['preco'];
    $km = $_POST['km'];

    $query = "INSERT INTO anunciar (marca, modelo, ano, cor, preco, km) VALUES ('$marca', '$modelo','$ano','$cor','$preco','$km')";
    $result = mysqli_query($con, $query);
}

// Redireciona ao menu se o botão Voltar for pressionado
if (@$_REQUEST['botao'] == "Voltar") {
    header("Location: menu.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Anúncio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>Crie seu anúncio:</h3>
        <form action="#" method="POST">
            Marca: <input type="text" name="marca" required><br>
            Modelo: <input type="text" name="modelo" required><br>
            Ano: <input type="number" name="ano" required><br>
            Cor: <input type="text" name="cor" required><br>
            Preço: <input type="number" name="preco" required><br>
            Km: <input type="number" name="km" required><br>
            <input type="submit" name="botao" value="Anunciar">
        </form>
        <form action="menu.php" method="get">
            <input type="submit" name="botao" value="Voltar">
        </form>
    </div>

</body>
</html>