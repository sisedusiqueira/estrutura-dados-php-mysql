<?php
session_start();
echo 'Esta � a primeira p�gina';
$_SESSION['nome'] = 'Juliano';
$_SESSION['sobrenome'] = 'Niederauer';
$_SESSION['data'] = date('d/m/Y', time());

// Se estiver utilizando cookies
echo '<br><a href="pagina2.php">P�gina 2</a>';

// Se estiver passando o identificador pela URL, use a linha abaixo
//echo '<br><a href="pagina2.php?'. SID .'">P�gina 2</a>';
?>

