<html>
<head>
<title>Anunciados</title>
<?php 
include ('config.php');
session_start(); // Inicia sessão para verificar login
?>
</head>

<body>
<form action="#" method="post" name="form1"> <!-- Mantemos a ação na mesma página -->
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
  </tr>

<?php
include('config.php');

// Pega os dados do formulário
$marca = $_POST['marca'] ?? '';
$modelo = $_POST['modelo'] ?? '';
$ano = $_POST['ano'] ?? '';
$cor = $_POST['cor'] ?? '';

// Monta a query com as condições corretas
$query = "SELECT * FROM anunciar WHERE id > 0"; // sempre começa com uma condição verdadeira

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
 </tr>

<?php
    } // fim while
?>
</table>

<!-- caixa de aviso no fim da página -->
<div style="width: 95%; margin: 20px auto; padding: 10px; border: 1px solid #ff0000; background-color: #ffe6e6; text-align: center;">
    <strong>Para mais informações, realizar o <button type="button" class="custom-button" onclick="window.location.href='login.php';">login</button><br></strong>
</div>

<?php
    } // fim else
}
?>
</body>
</html>