<?php
include ('config.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $login = mysqli_real_escape_string($con, $login);
    $senha = mysqli_real_escape_string($con, $senha);

    $query="SELECT * FROM usuario WHERE login='$login' AND senha='$senha'";
    $result=mysqli_query($con, $query);

    while ($coluna=mysqli_fetch_array($result)) 
	{
		
		$_SESSION["id_usuario"]= $coluna["id"]; 
		$_SESSION["nome_usuario"] = $coluna["login"]; 
		header("Location: menu.php"); 
		exit; 

	}

}

if(@$_REQUEST['botao']=="Sem"){
    header("Location: menu_semlogin.php");
    exit;
}


?>






<html>
<body>
    <form action=# method=POST>

    Login: <input type=text name=login>
    Senha: <input type=password name=senha><br>
    <input type=submit name=botao value=Entrar>
    <input type=submit name=botao value=Cadastro><br>
    <h3>Continue sem login:</h3>
    <input type=submit name=botao value="Sem Login">
    </form>
</body>
</html>