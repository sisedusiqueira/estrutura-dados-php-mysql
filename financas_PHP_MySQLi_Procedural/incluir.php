<?php
include "valida_cookies.inc";
$usuario = $_COOKIE["usuario"];
$tipo = $_GET["tipo"];

if($tipo=="RF")
    $titulo = "RECEITAS FIXAS";
elseif($tipo=="RV")
    $titulo = "RECEITAS VARIÁVEIS";
elseif($tipo=="DF")
    $titulo = "DESPESAS FIXAS";
elseif($tipo=="DV")
    $titulo = "DESPESAS VARIÁVEIS";
?>
<html>
<head>
<title>Controle de gastos mensais</title>

<script language="javascript">
function valida_dados (formulario)
{
    if (formulario.descricao_nova.value=="" && formulario.descricao[0].checked==true)
    {
        alert ("Você não digitou a descrição.");
        return false;
    }
    if (formulario.ano.value.length<4)
    {
        alert ("Digite o ano com quatro dígitos.");
        return false;
    }
    if (formulario.valor.value=="")
    {
        alert ("Você não digitou o valor.");
        return false;
    }
return true;
}
</script>


</head>
<body>
<h1 align="center">Controle de gastos mensais</h1>
<p align="center">Inclusão de <b><?php echo $titulo; ?></b>:</p>
<hr>
<form method="POST" action="gravar.php" name="formulario" onSubmit="return valida_dados(this)">
<input type="hidden" name="tipo" value="<?php echo $tipo; ?>" checked>
<p align="center">
Descrição:
<input type="radio" name="descricao" value="nova" checked>
Nova: <input type="text" name="descricao_nova" size="20" onKeyDown="javascript:formulario.descricao[0].checked=true">

<input type="radio" value="existente" name="descricao"> Existente:

<select size="1" name="descricao_existente" onChange="javascript:formulario.descricao[1].checked=true">

<?php
	// monta a lista das descrições já existentes para esse tipo
    include "conecta_banco.inc";
    $res = mysqli_query($con, "SELECT distinct(descricao) FROM receitas_despesas WHERE usuario='$usuario' and tipo='$tipo' order by descricao");
    $linhas = mysqli_num_rows($res);
    for($i=0; $i<$linhas; $i++)
    {
        $dados = mysqli_fetch_row($res);
        $descricao = $dados[0];
        echo "<option value=\"$descricao\">$descricao</option>";
    }
    mysqli_close($con);
?>
</select>

</p>

  <p align="center">Mês: <select size="1" name="mes">
    <option value="1">Jan</option>
    <option value="2">Fev</option>
    <option value="3">Mar</option>
    <option value="4">Abr</option>
    <option value="5">Mai</option>
    <option value="6">Jun</option>
    <option value="7">Jul</option>
    <option value="8">Ago</option>
    <option value="9">Set</option>
    <option value="10">Out</option>
    <option value="11">Nov</option>
    <option value="12">Dez</option>
  </select>
  Ano: <input type="text" name="ano" size="4" maxlength="4" value="<?php echo date("Y",time()); ?>">
  </p>
  <p align="center">Valor: <input type="text" name="valor" size="10" maxlength="10"></p>
  <p align="center"><input type="submit" value="Enviar" name="enviar"></p>
</form>
<hr>
</body>
</html>
