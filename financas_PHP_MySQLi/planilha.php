<?php
include "valida_cookies.inc";
$meses = array ("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
$usuario = $_COOKIE["usuario"];

// obtém os valores digitados
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$mes2 = $_POST["mes2"];
$ano2 = $_POST["ano2"];

// colocar datas no formato AAAA-MM-DD para consulta
$data = "$ano-$mes-01";
$data2 = "$ano2-$mes2-01";
$array_datas = $RF = $RV = $DF = $DV = array();

// acessa o banco de dados e obtém os registros do usuário e do perído
include "conecta_banco.inc";
$comandoSQL = "SELECT descricao,tipo,data,valor FROM receitas_despesas ";
$comandoSQL .= "WHERE usuario='$usuario' and data>='$data' and data<='$data2' order by data,descricao";
$res = $con->query($comandoSQL);
$linhas = $res->num_rows;

if($linhas==0)
{
    echo "Não há receitas e despesas no período escolhido!";
    exit;
}
else  // coloca os dados em arrays
{
    for($i=0; $i<$linhas; $i++)
    {
        $dados = $res->fetch_row();
        $descricao = $dados[0];
        $tipo = $dados[1];
        $data = $dados[2];
        $valor = $dados[3];
        
		$aux = explode("-",$data);
		$ano = $aux[0];
		$mes = $aux[1];
		$dia = $aux[2];
        $numero_mes = $mes-1;
        $data = $meses[$numero_mes] . "-" . $ano;
        
        if (!in_array($data, $array_datas))
            $array_datas[] = $data;

        if($tipo=="RF")     // receita fixa
        {
            if (!in_array($descricao, $RF))
                $RF[]=$descricao;
            $receitas_fixas[$descricao][$data]= $valor;
            if(isset($total_receitas[$data]))
                $total_receitas[$data] += $valor;
            else
                $total_receitas[$data] = $valor;
        }
        elseif($tipo=="RV")     // receita variável
        {
            if (!in_array($descricao, $RV))
                $RV[]=$descricao;
            $receitas_variaveis[$descricao][$data]= $valor;
            if(isset($total_receitas[$data]))
                $total_receitas[$data] += $valor;
            else
                $total_receitas[$data] = $valor;
        }
        elseif($tipo=="DF")     // despesa fixa
        {
            if (!in_array($descricao, $DF))
                $DF[]=$descricao;
            $despesas_fixas[$descricao][$data]= $valor;
            if(isset($total_despesas[$data]))
                $total_despesas[$data] += $valor;
            else
                $total_despesas[$data] = $valor;
        }
        elseif($tipo=="DV")     // despesa variável
        {
            if (!in_array($descricao, $DV))
                $DV[]=$descricao;
            $despesas_variaveis[$descricao][$data]= $valor;
            if(isset($total_despesas[$data]))
                $total_despesas[$data] += $valor;
            else
                $total_despesas[$data] = $valor;
        }
    }
}

$con->close();

$numero_colunas = sizeof($array_datas);
$colunas_html = $numero_colunas+1;
?>

<html>
<head>
<title>Controle de gastos mensais</title>
</head>
<body>
<h1 align="center">Controle de gastos mensais</h1>
<div align="center">
  <center>
  <table border="1" cellspacing="0">
    <tr>
      <td width="142"></td>

    <?php
        // ----- exibe as datas -----
        foreach($array_datas as $data)
            echo "<td align=\"center\" width=\"100\"><b><font color=\"#000080\">$data</font></b></td>";
    ?>

    </tr>
    <tr>
      <td colspan="<?php echo $colunas_html; ?>" bgcolor="#F5F5F5"><b>RECEITAS FIXAS</b></td>
    </tr>

    <?php
    // ----- exibe as receitas fixas -----
    for($i=0; $i<sizeof($RF); $i++)
    {
        $descricao = $RF[$i];
        echo "<tr><td width=\"142\">$descricao</td>";

        for($j=0; $j<$numero_colunas; $j++)
        {
            $data = $array_datas[$j];
            if(isset($receitas_fixas[$descricao][$data]))
            {
                $valor = $receitas_fixas[$descricao][$data];
                echo "<td align=\"center\" width=\"100\">$valor</td>";
            }
            else
               echo "<td align=\"center\" width=\"100\">&nbsp;&nbsp;</td>";
        }
        echo "</tr>";
    }
    ?>

    <tr>
      <td colspan="<?php echo $colunas_html; ?>" bgcolor="#F5F5F5"><b>RECEITAS VARIÁVEIS</b></td>
    </tr>

    <?php
	// ----- exibe as receitas variáveis -----
    for($i=0; $i<sizeof($RV); $i++)
    {
        $descricao = $RV[$i];
        echo "<tr><td width=\"142\">$descricao</td>";

        for($j=0; $j<$numero_colunas; $j++)
        {
            $data = $array_datas[$j];
            if(isset($receitas_variaveis[$descricao][$data]))
            {
                $valor = $receitas_variaveis[$descricao][$data];
                echo "<td align=\"center\" width=\"100\">$valor</td>";
            }
            else
               echo "<td align=\"center\" width=\"100\">&nbsp;&nbsp;</td>";
        }
        echo "</tr>";
    }
    ?>

    <tr>
      <td width="142" bgcolor="#D7FFFF"><b>Total Receitas:</b></td>

    <?php
    	// ----- exibe o total de receitas -----
        foreach($array_datas as $data)
        {
            if(isset($total_receitas[$data]))
                $total = $total_receitas[$data];
            else
                $total = 0;
            echo "<td align=\"center\" bgcolor=\"#D7FFFF\" width=\"100\"><b>$total</b></td>";
        }
    ?>

    </tr>

    <tr>
      <td colspan="<?php echo $colunas_html; ?>" bgcolor="#F5F5F5"><b>DESPESAS FIXAS</b></td>
    </tr>

    <?php
    // ----- exibe as despesas fixas -----
    for($i=0; $i<sizeof($DF); $i++)
    {
        $descricao = $DF[$i];
        echo "<tr><td width=\"142\">$descricao</td>";

        for($j=0; $j<$numero_colunas; $j++)
        {
            $data = $array_datas[$j];
            if(isset($despesas_fixas[$descricao][$data]))
            {
                $valor = $despesas_fixas[$descricao][$data];
                echo "<td align=\"center\" width=\"100\">$valor</td>";
            }
            else
               echo "<td align=\"center\" width=\"100\">&nbsp;&nbsp;</td>";
        }
        echo "</tr>";
    }
    ?>

    <tr>
      <td colspan="<?php echo $colunas_html; ?>" bgcolor="#F5F5F5"><b>DESPESAS VARIÁVEIS</b></td>
    </tr>

    <?php
    // ----- exibe as despesas variáveis -----
    for($i=0; $i<sizeof($DV); $i++)
    {
        $descricao = $DV[$i];
        echo "<tr><td width=\"142\">$descricao</td>";

        for($j=0; $j<$numero_colunas; $j++)
        {
            $data = $array_datas[$j];
            if(isset($despesas_variaveis[$descricao][$data]))
            {
                $valor = $despesas_variaveis[$descricao][$data];
                echo "<td align=\"center\" width=\"100\">$valor</td>";
            }
            else
               echo "<td align=\"center\" width=\"100\">&nbsp;&nbsp;</td>";
        }
        echo "</tr>";
    }
    ?>


    <tr>
      <td width="142" bgcolor="#FFE1E1"><b>Total Despesas:</b></td>

    <?php
        // ----- exibe o total de despesas -----
        foreach($array_datas as $data)
        {
            if(isset($total_despesas[$data]))
                $total = $total_despesas[$data];
            else
                $total = 0;
            echo "<td align=\"center\" bgcolor=\"#FFE1E1\" width=\"100\"><b>$total</b></td>";
        }
    ?>

    </tr>

    <tr>
      <td width="142"><b>GRÁFICO DESPESAS</b></td>
    <?php
        // ----- exibe o link para a geração do gráfico -----
        foreach($array_datas as $data)
        {
            if(isset($total_despesas[$data]))
                echo "<td align=\"center\" width=\"100\"><a href=\"gera_grafico.php?data=$data\"><img src=\"grafico.gif\" border=\"0\"></a></td>";
            else
                echo "<td align=\"center\" width=\"100\">-</td>";
        }
    ?>
    </tr>

    <tr>
      <td width="142"><b>PDF DESPESAS</b></td>
    <?php
        // ----- exibe o link para a geração do PDF -----
        foreach($array_datas as $data)
        {
            if(isset($total_despesas[$data]))
                echo "<td align=\"center\" width=\"100\"><a href=\"gera_pdf.php?data=$data\" target=\"blank\"><img src=\"pdf.gif\" border=\"0\"></a></td>";
            else
                echo "<td align=\"center\" width=\"100\">-</td>";
        }
    ?>
    </tr>

    <tr>
      <td width="142"><b>E-MAIL DESPESAS</b></td>
    <?php
        // ----- exibe o link para o envio do e-mail  -----
        foreach($array_datas as $data)
        {
            if(isset($total_despesas[$data]))
                echo "<td align=\"center\" width=\"100\"><a href=\"gera_email.php?data=$data\"><img src=\"email.gif\" border=\"0\"></a></td>";
            else
                echo "<td align=\"center\" width=\"100\">-</td>";
        }
    ?>
    </tr>


    <tr>
      <td width="142" bgcolor="#CCFFCC"><b>SALDO</b></td>

    <?php
        // --- exibe o saldo (AZUL positivo, VERMELHO negativo)  ---
        foreach($array_datas as $data)
        {
            $saldo=0;
            if(isset($total_receitas[$data]))
                $saldo += $total_receitas[$data];
            if(isset($total_despesas[$data]))
                $saldo -= $total_despesas[$data];

            if($saldo<0)
                $cor = "#FF0000";  // vermelho
            else
                $cor = "#0000FF";   // azul

            echo "<td align=\"center\" bgcolor=\"#CCFFCC\" width=\"100\"><font color=\"$cor\"><b>$saldo</b></font></td>";
        }
    ?>


    </tr>


  </table>
  </center>
</div>
<p align="center"><a href="principal.php">Voltar</a></p>


</body>
</html>
