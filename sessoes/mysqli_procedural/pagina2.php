<?php
session_start();
echo 'Esta � a segunda p�gina <br>';
echo $_SESSION['nome'] . "<br>";
echo $_SESSION['sobrenome'] . "<br>";
echo $_SESSION['data'] . "<br>";
echo '<br><a href="pagina1.php">P�gina 1</a>';
?>

