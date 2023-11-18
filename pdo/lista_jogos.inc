<?php
$usuario = 'juliano';
$senha = '12345';
$servidor = 'localhost';
$banco = 'test';

try{
	$db = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
	$hoje = date("Y-m-d");
//	$hoje = "2018-05-22";
	$sql = "SELECT jogo,local,horario FROM jogos WHERE data='$hoje' ORDER BY horario";
	$res = $db->query($sql);
	while ($linha = $res->fetch()){
		$jogo = $linha["jogo"];
		$local = $linha["local"];
		$horario = $linha["horario"];
		echo "<tr>";
		echo "<td>$horario</td>";
		echo "<td>$jogo</td>";
		echo "<td>$local</td>";
		echo "</tr>";
	}
	$db=null;
}
catch(PDOException $e) {
  echo $e->getMessage();
}
?>

