<?php
$fotos = array(
"gremio.jpg",
"guias.jpg",
"cooler.jpg",
"guias.jpg",
"cooler.jpg",
"gremio.jpg"
);

$fotos_por_linha = 3;
?>

<html>
<head>
<title>Meu álbum de fotos</title>
</head>
<body>
<h1 align="center">Meu álbum de fotos</h1>

<?php
// calcula o número de linhas
$num_fotos = sizeof($fotos);
$num_linhas = intval ($num_fotos/$fotos_por_linha);
if($num_fotos % $fotos_por_linha!=0)
    $num_linhas++;

// exibe as fotos
$indice = 0;
for($i=0; $i<$num_linhas; $i++)
{
    echo "<p align='center'>";
    for($j=0; $j<$fotos_por_linha; $j++)
    {
        if($indice<$num_fotos)
        {
            $original = $fotos[$indice];
            // monta o nome do arquivo miniatura
            $mini = explode('.', $original);
            $mini = $mini[0]."_mini.jpg";
            echo "<a href='$original' target='_blank'><img src='$mini' border=0></a> &nbsp;&nbsp;";
            $indice++;
        }
    }
    echo "</div>";
}
?>
</body>
</html>