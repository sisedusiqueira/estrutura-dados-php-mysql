<?php
include "valida_cookies.inc";
?>
<html>
<head>
<title>Controle de gastos mensais</title>
</head>
<body>
<h1 align="center">Controle de gastos mensais</h1>
<p align="center">Escolha o período de visualização:</p>
<hr>
<form method="POST" action="planilha.php">
<p align="center">Mês: <select size="1" name="mes">
    <option value="01">Jan</option>
    <option value="02">Fev</option>
    <option value="03">Mar</option>
    <option value="04">Abr</option>
    <option value="05">Mai</option>
    <option value="06">Jun</option>
    <option value="07">Jul</option>
    <option value="08">Ago</option>
    <option value="09">Set</option>
    <option value="10">Out</option>
    <option value="11">Nov</option>
    <option value="12">Dez</option>
  </select>
  Ano: <input type="text" name="ano" size="4" maxlength="4" value="<?php echo date("Y",time()); ?>">
  </p>
  
<p align="center">até
  </p>
  
<p align="center">Mês: <select size="1" name="mes2">
    <option value="01">Jan</option>
    <option value="02">Fev</option>
    <option value="03">Mar</option>
    <option value="04">Abr</option>
    <option value="05">Mai</option>
    <option value="06">Jun</option>
    <option value="07">Jul</option>
    <option value="08">Ago</option>
    <option value="09">Set</option>
    <option value="10">Out</option>
    <option value="11">Nov</option>
    <option value="12">Dez</option>
  </select>
  Ano: <input type="text" name="ano2" size="4" maxlength="4" value="<?php echo date("Y",time()); ?>">
  </p>  
<p align="center">&nbsp;<input type="submit" value="Visualizar" name="ok">
  </p>
  
</form>
<hr>
</body>
</html>
