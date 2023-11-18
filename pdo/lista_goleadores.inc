<?php
$usuario = 'juliano';
$senha = '12345';
$servidor = 'localhost';
$banco = 'test';

try{
	$db = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
	$sql = "SELECT * FROM goleadores ORDER BY gols DESC LIMIT 5";
	$res = $db->query($sql);
	while ($linha = $res->fetch()){	
		$nome = $linha["nome"];
		$time = $linha["time"];
		$gols = $linha["gols"];
		echo "<tr>";
		echo "<td>$nome</td>";
		echo "<td>$time</td>";
		echo "<td>$gols</td>";
		echo "</tr>";
	}
	$db=null;
}
catch(PDOException $e) {
  echo $e->getMessage();
}
?>

