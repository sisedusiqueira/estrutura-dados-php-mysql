<html>
<body>
<h2 align="center">Exclus�o de registros</h2>
<?php
include 'valida_cookies.inc';
$usuario = $_COOKIE["usuario"];
$meses = array ("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");

// --- obt�m todos os registros do usu�rio ---
include "conecta_banco.inc";
$res = $con->query("select id,descricao,data,valor from receitas_despesas where usuario='$usuario' order by data desc");
$num_linhas = $res->num_rows;

for($i=0 ; $i<$num_linhas; $i++)
{
    $dados = $res->fetch_row();
    $id = $dados[0];
    $descricao = $dados[1];
    $data = $dados[2];
    $valor = $dados[3];
	$aux = explode("-",$data);
	$ano = $aux[0];
	$mes = $aux[1];
	$dia = $aux[2];
    $nome_mes = $meses[$mes-1];

    echo "$nome_mes/$ano - $descricao (R\$$valor) ";
    echo "<a href=\"elimina.php?id=$id\">Excluir</a><br>";
}
$con->close();
?>
</body>
</html>
