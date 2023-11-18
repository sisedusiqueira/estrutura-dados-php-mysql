<html>
<body>
<h2 align="center">Exclusão de registros</h2>
<?php
include 'valida_cookies.inc';
$usuario = $_COOKIE["usuario"];
$meses = array ("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");

// --- obtém todos os registros do usuário ---
include "conecta_banco.inc";
$res = dbx_query($con, "select id,descricao,data,valor from receitas_despesas where usuario='$usuario' order by data desc");
$num_linhas = $res->rows;

for($i=0 ; $i<$num_linhas; $i++)
{
    $id = $res->data[$i][0];
    $descricao = $res->data[$i][1];
    $data = $res->data[$i][2];
    $valor = $res->data[$i][3];
	$aux = explode("-",$data);
	$ano = $aux[0];
	$mes = $aux[1];
	$dia = $aux[2];
    $nome_mes = $meses[$mes-1];

    echo "$nome_mes/$ano - $descricao (R\$$valor) ";
    echo "<a href=\"elimina.php?id=$id\">Excluir</a><br>";
}
dbx_close($con);
?>
</body>
</html>
