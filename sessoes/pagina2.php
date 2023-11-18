<?php
session_start();
echo 'Esta é a segunda página <br>';
echo $_SESSION['nome'] . "<br>";
echo $_SESSION['sobrenome'] . "<br>";
echo $_SESSION['data'] . "<br>";
echo '<br><a href="pagina1.php">Página 1</a>';
?>

