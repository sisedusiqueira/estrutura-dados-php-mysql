<?php
$servidor = "localhost";
$usuario = "juliano";
$senha = "12345";
$banco = "test";

$con = mysqli_connect($servidor, $usuario, $senha, $banco);
    $res = mysqli_query($con, "SELECT titulo,autor FROM livros");
    $num_linhas = mysqli_num_rows($res);

    for($i=0 ; $i<$num_linhas; $i++)
    {
        $dados = mysqli_fetch_row ($res);
        $titulo = $dados[0];
        $autor = $dados[1];
        echo "$titulo - $autor <br>";
    }
mysqli_close($con);
?>