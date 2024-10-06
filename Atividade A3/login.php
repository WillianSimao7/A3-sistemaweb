<?php
include ('config.php');
session_start(); // inicia sessão

// se clicar no botão entrar
if (@$_REQUEST['botao'] == "Entrar") {

    // verifica login e senha
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    $query = "SELECT * FROM usuario WHERE login='$login' AND senha='$senha'";
    $result = mysqli_query($con, $query);

    while ($coluna = mysqli_fetch_array($result)) {
        $_SESSION["id_usuario"] = $coluna["id"];
        $_SESSION["nome_usuario"] = $coluna["login"];
        $_SESSION["UsuarioNivel"] = $coluna['nivel'];

        // para direcionar para páginas diferentes
        $niv = $coluna['nivel'];
        // se for usuario, entra no menu
        if ($niv == "USER") {
            header("Location: menu.php");
            exit;
        }

        // se for administrador, entrar nos anunciados para poder deletar anuncio
        if ($niv == "ADM") {
            header("Location: anunciosadm.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"], .custom-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover, .custom-button:hover {
            background-color: #0056b3;
        }

        button.custom-button {
            background-color: #28a745;
        }

        button.custom-button:hover {
            background-color: #218838;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="#" method="POST" id="loginForm">
            <input type="text" name="login" placeholder="Login" required>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="submit" name="botao" value="Entrar">
            <button type="button" class="custom-button" onclick="window.location.href='cadastro.php';">Cadastro</button><br>
            <button type="button" class="custom-button" onclick="window.location.href='menusemlogin.php';">Continuar sem login</button>
        </form>
    </div>

</body>
</html>