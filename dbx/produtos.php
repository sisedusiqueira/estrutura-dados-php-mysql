<?php
$categoria = $_POST['categoria'];
if(empty($categoria))
{
	echo "Nenhuma categoria foi selecionada!";
	exit;
}
?>

<html>
<head>
<title>Produtos</title>
</head>
<body>
<h1 align="center">Produtos</h1>
<hr>

<?php
$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "test";

$con = dbx_connect ("mysql", $servidor, $banco, $usuario, $senha);

    $res = dbx_query ($con, "select * from produtos where codigo_categoria=$categoria");

    if (is_object($res))
    {
        $num_linhas = $res->rows;

        for($i=0 ; $i<$num_linhas; $i++)
        {
            $nome = $res->data[$i][1];
            $descricao = $res->data[$i][2];
            $preco = $res->data[$i][3];
			$preco = number_format ($preco , 2 , "," , ".");
			
			echo "<p>";
			echo "<b><u>$nome</u></b> ";
			echo "<font color='#FF0000'>(R\$$preco)</font><br>";
			echo "$descricao";
			echo "</p>";
        }
    }

dbx_close ($con);
?>

</table>
<hr>
<p align="center"><a href="categorias.php">Voltar</a></p>
</body>
</html>
