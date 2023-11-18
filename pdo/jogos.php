<?php date_default_timezone_set("America/Sao_Paulo"); ?>
<html>
<head>
<title>Campeonato Brasileiro</title>
</head>
<body>
<h1 align="center">Campeonato Brasileiro</h1>
<p align="center">Confira os jogos de hoje (<?php echo date("d/m/Y"); ?>):</p>
<div align="center">
  <center>
  <table border="1">
    <tr>
      <td bgcolor="#D6D6D6"><b>Horário</b></td>
      <td bgcolor="#D6D6D6"><b>Jogo</b></td>
      <td bgcolor="#D6D6D6"><b>Local</b></td>
    </tr>

    <?php include "lista_jogos.inc"; ?>

  </table>
  </center>
</div>

</body>
</html>

