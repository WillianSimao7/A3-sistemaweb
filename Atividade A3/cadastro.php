<?php
include('config.php');

if(@$_REQUEST['botao'] == "Cadastrar"){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $query = "insert into usuario (login, senha) values ('$login', '$senha')";
    $result = mysqli_query($con, $query);
}

if(@$_REQUEST['botao']=="Logar"){
    header("Location: login.php");
    exit;
}

?>



<html>
<body>
<form action=# method=POST>
    Login: <input type=text name=login>
    Senha: <input type=text name=senha><br>
    <input type=submit name=botao value=Cadastrar>
    <input type=submit name=botao value=Logar>
</form>
</body>
</html>