<?php
$usuario = 'juliano';
$senha = '12345';
$servidor = 'localhost';
$banco = 'test';
try{
	$db = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
	$sql = "SELECT * FROM livros LIMIT 3";
	$res = $db->query($sql);
	while ($linha = $res->fetch()){
		$isbn = $linha["isbn"];
		$titulo = $linha["titulo"];
		$autor = $linha["autor"];
		echo "$isbn - $titulo - $autor<br>";
	}
	$db=null;
}
catch(PDOException $e) {
  echo $e->getMessage();
}
?>