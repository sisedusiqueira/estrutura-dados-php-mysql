<?php
include 'valida_cookies.inc';

if(!isset($_POST["email"]))
{
    $data = $_GET["data"];
    echo "<html><body>";
    echo "<form method=\"POST\" action=\"gera_email.php\">";
    echo "<input type=\"hidden\" name=\"data\" value=\"$data\">";
    echo "Seu e-mail: <input type=\"text\" name=\"email\" size=\"30\">";
    echo " <input type=\"submit\" name=\"enviar\" value=\"Enviar\">";
    echo "</form>";
    echo "</body></html>";
}
else
{
    $email = $_POST["email"];

    if (strlen($email)<8 || substr_count($email, "@")!=1  || substr_count($email, ".")==0)
	   echo "O e-mail digitado é inválido! ";
    else
    {
        $usuario = $_COOKIE["usuario"];
        $data = $_POST["data"];
        $meses = array ("Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");

		$aux = explode("-",$data);
		$mes = $aux[0];
		$ano = $aux[1];
        $mes = array_search($mes, $meses)+1;
        $data_buscar = "$ano-$mes-01";

        // --- definição dos dados ---
        include "conecta_banco.inc";
        $res = $con->query("select descricao,valor from receitas_despesas where usuario='$usuario' and data='$data_buscar' and (tipo='DF' or tipo='DV') order by descricao");
		$registros=$res->fetchAll();
		$num_linhas = sizeof($registros);

        for($i=0 ; $i<$num_linhas; $i++)
        {
            $descricoes[] = $registros[$i][0];
            $valores[] = $registros[$i][1];
        }
        $con=null;

        // --- cálculo do total ---
        $total = 0;
        $num_linhas = sizeof($descricoes);
        for($i=0 ; $i<$num_linhas; $i++)
            $total += $valores[$i];

        // --- monta a mensagem e manda o e-mail ---
        $msg = "Lista de despesas - $data\n\n";
        for($i=0 ; $i<$num_linhas; $i++)
        {
            $descricao = $descricoes[$i];
            $valor = $valores[$i];
            $msg .= "$descricao - R\$$valor\n";
        }

        $msg .= "\nTotal de despesas: R\$$total";
        //echo $msg;
        mail($email, "Despesas de $data", $msg, "From:contato@seudominio.com.br", "-r seuemail@seudominio.com.br");
        echo "As despesas de $data foram enviadas para o e-mail especificado.";
    }
}
?>
