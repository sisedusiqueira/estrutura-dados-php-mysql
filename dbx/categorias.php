<html>
<head>
<title>Produtos</title>
</head>
<body>
<h1 align="center">Categoria de produtos</h1>

<form method="POST" action="produtos.php">

<p align="center">
Escolha a categoria desejada: 
<select name="categoria">
<?php
$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "test";

$con = dbx_connect ("mysql", $servidor, $banco, $usuario, $senha);

	$res = dbx_query ($con, "select * from categorias");

	$num_linhas = $res->rows;

	for($i=0 ; $i<$num_linhas; $i++)
	{
		$id_categoria = $res->data[$i][0];
		$categoria = $res->data[$i][1];
		echo "<option value=\"$id_categoria\">$categoria</option>";
	}

dbx_close ($con);
?>
</select></p>

<p align="center"><input type="submit" value="Listar produtos" name="enviar"></p>
</form>

</body>
</html>
