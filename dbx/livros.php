<?php
$chave = $_POST['chave'];
$busca = $_POST['busca'];
if(strlen($busca)<2)
{
	echo "O termo a ser buscado deve ter no mínimo 2 caracteres!";
	exit;
}
?>

<html>
<head>
<title>Livros</title>
</head>
<body>
<h1 align="center">Livros da Novatec Editora</h1>
<hr>
<table cellspacing="3">
	<tr bgcolor="#d6d6d6">
		<td><b>ISBN</b></td>
		<td><b>Título</b></td>
		<td><b>Autor</b></td>
		<td><b>Páginas</b></td>
	</tr>

<?php
$consulta_sql = "SELECT * FROM livros WHERE $chave like '%$busca%'";
$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "test";

$con = dbx_connect ("mysql", $servidor, $banco, $usuario, $senha);

    $res = dbx_query ($con, $consulta_sql);

    if (is_object($res))
    {
        $num_linhas = $res->rows;

        for($i=0 ; $i<$num_linhas; $i++)
        {
            $isbn = $res->data[$i][0];
            $titulo = $res->data[$i][1];
            $autor = $res->data[$i][2];
            $paginas = $res->data[$i][3];

			echo "<tr bgcolor=\"#eeeeee\">";
			echo "<td>$isbn</td>";
			echo "<td>$titulo</td>";
			echo "<td>$autor</td>";
			echo "<td>$paginas</td>";
			echo "</tr>";
        }
    }

dbx_close ($con);
?>

</table>
<hr>
<p align="center"><a href="livros.html">Voltar</a></p>
</body>
</html>
