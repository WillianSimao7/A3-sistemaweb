<?php
include('config.php');

// Solicita as informações de cadastro e registra no banco
if (isset($_POST['botao']) && $_POST['botao'] == "Cadastrar") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $nivel = $_POST['nivel'];

    // Valida se todos os campos foram preenchidos antes de inserir no banco
    if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($login) && !empty($senha) && !empty($nivel)) {
        $query = "INSERT INTO usuario (nome, email, telefone, login, senha, nivel) VALUES ('$nome','$email','$telefone','$login', '$senha','$nivel')";
        $result = mysqli_query($con, $query);
    }
}
?>

<html>
<head>
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
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 300px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #4CAF50;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .login-link {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #2196F3;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 10px;
        }

        .login-link:hover {
            background-color: #1976D2;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Cadastro</h2>
        <form action="#" method="POST">
            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>

            <label for="telefone">Telefone:</label>
            <input type="number" name="telefone" id="telefone" required>

            <label for="login">Login:</label>
            <input type="text" name="login" id="login" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>

            <label for="nivel">Nível:</label>
            <input type="text" name="nivel" id="nivel" required>

            <div class="button-container">
                <input type="submit" name="botao" value="Cadastrar">
            </div>
        </form>

        <!-- Botão para redirecionar para a página de login -->
        <a href="login.php" class="login-link">Logar</a>
    </div>
</body>
</html>