<?php
include('config.php');
if(@$_REQUEST['botao'] == "Criar Anuncio"){
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $preco = $_POST['preco'];
    $km = $_POST['km'];

    $query = "insert into anunciar (marca, modelo, ano, cor, preco, km) values ('$marca', '$modelo','$ano','$cor','$preco','$km')";
    $result = mysqli_query($con, $query);
}


?>




<hotml>
<body>
    <h1>Crie seu anúncio:<h1>
    <form action = # method=POST>
    Marca:<input type=text name=marca><br>
    Modelo:<input type=text name=modelo><br>
    Ano:<input type=number name=ano><br>
    Cor:<input type=text name=cor><br>
    Preço:<input type=number name=preco><br>
    Km:<input type=number name=km><br>
    <!-- imagem: tem que pesquisar -->
    <input type=submit name=botao value="Criar Anuncio">
    
    </form>

</body>
</html>
