<?php
include ('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST('login');
    $senha = $_POST['senha'];

    $login = mysqli_real_escape_string($con, $login);
    $senha = mysqli_real_escape_string($con, $senha);

    $query="SELECT * FROM usuario WHERE login='$login'";
    $result=mysqli_query($con, $query);

        if($result && mysql_num_rows($result) > 0){
            $user = mysqli_fetch_assoc($result);
        }

            if(password_verify($senha, $user['senha'])){
                $_SESSION['login'] = $user['login'];
                $_SESSION['id'] = $user['id'];

                header("Location:menu.php");
                exit;
            }else {
                echo "Senha incorreta.";
            }

}


?>






<html>
<body>
    <form action=# method=POST>

    Login: <input type=text name=login>
    Senha: <input type=password name=senha>
    <input type=submit name=botao value=Entrar>
    <input type=submit name=botao value=Cadastro>
    </form>
</body>
</html>