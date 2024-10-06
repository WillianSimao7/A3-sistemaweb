<html>
<head>
<title>Anunciados</title>
<?php include ('config.php');  ?>
</head>

<body>
<form action="anuncios.php?botao=Gerar" method="post" name="form1">
<table width="95%" border="1" align="center">
  <tr>
    <td colspan=16 align="center">Anunciados</td>
  </tr>
  <tr>
    <td width="18%" align="right">Marca:</td>
    <td width="26%"><input type="text" name="marca"  /></td>

    <td width="17%" align="right">Modelo:</td>
    <td width="18%"><input type="text" name="modelo" size="3" /></td>

    <td width="17%" align="right">Ano:</td>
    <td width="18%"><input type="number" name="ano" size="3" /></td>

    <td width="17%" align="right">Cor:</td>
    <td width="18%"><input type="text" name="cor" size="3" /></td>

    <td width="17%" align="right">Preço:</td>
    <td width="18%"><input type="number" name="preco" size="3" /></td>

    <td width="17%" align="right">Quilometragem:</td>
    <td width="18%"><input type="number" name="km" size="3" /></td>

    <td width="21%"><input type="submit" name="botao" value="Gerar" /></td>
  </tr>
</table>
</form>

<?php if (@$_REQUEST['botao'] == "Gerar") { ?>

<table width="95%" border="1" align="center">
  <tr bgcolor="#9999FF">
    <th width="5%">Cód</th>
    <th width="15%">Marca</th>
    <th width="10%">Modelo</th>
    <th width="10%">Ano</th>
    <th width="10%">Cor</th>
    <th width="10%">Preço</th>
    <th width="10%">Quilometragem</th>
    <th width="30%">Descrição</th>
  </tr>

<?php
include('config.php');

// Pega os dados do formulário
$marca = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$ano = $_POST['ano'] ?? '';
$cor = $_POST['cor'] ?? '';
$preco = $_POST['preco'] ?? '';
$km = $_POST['km'] ?? '';

// Monta a query com as condições corretas
$query = "SELECT * FROM anunciar WHERE id > 0"; 

if (!empty($marca)) {
    $query .= " AND marca LIKE '%$marca%'";
}
if (!empty($modelo)) {
    $query .= " AND modelo LIKE '%$modelo%'";
}
if (!empty($ano)) {
    $query .= " AND ano = '$ano'"; 
}
if (!empty($cor)) {
    $query .= " AND cor LIKE '%$cor%'";
}
if (!empty($preco)) {
    $query .= " AND preco = '$preco'";
}
if (!empty($km)) {
    $query .= " AND km = '$km'";
}

// Executa a query
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Erro na consulta: " . mysqli_error($con);
} else {
    // Exibe os resultados
    while($coluna = mysqli_fetch_array($result)) {
?>

 <tr>
    <td width="5%"><?php echo $coluna['id']; ?></td>
    <td width="15%"><?php echo $coluna['marca']; ?></td>
    <td width="10%"><?php echo $coluna['modelo']; ?></td>
    <td width="10%"><?php echo $coluna['ano']; ?></td>
    <td width="10%"><?php echo $coluna['cor']; ?></td>
    <td width="10%"><?php echo $coluna['preco']; ?></td>
    <td width="10%"><?php echo $coluna['km']; ?></td>
    <td width="30%"><?php echo $coluna['descricao']; ?></td> 
 </tr>

<?php
    } // fim while
?>
</table>

<?php
    } // fim else
}
?>
</body>
</html>