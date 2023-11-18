<?php

function verificaCNPJ($cnpj)
{
	if (strlen($cnpj) <> 14)
		return 0;
	$soma1 = ($cnpj[0] * 5) +
				($cnpj[1] * 4) +
				($cnpj[2] * 3) +
				($cnpj[3] * 2) +
				($cnpj[4] * 9) +
				($cnpj[5] * 8) +
				($cnpj[6] * 7) +
				($cnpj[7] * 6) +
				($cnpj[8] * 5) +
				($cnpj[9] * 4) +
				($cnpj[10] * 3) +
				($cnpj[11] * 2);
	$resto = $soma1 % 11;
	$digito1 = $resto < 2 ? 0 : 11 - $resto;

	$soma2 = ($cnpj[0] * 6) +
				($cnpj[1] * 5) +
				($cnpj[2] * 4) +
				($cnpj[3] * 3) +
				($cnpj[4] * 2) +
				($cnpj[5] * 9) +
				($cnpj[6] * 8) +
				($cnpj[7] * 7) +
				($cnpj[8] * 6) +
				($cnpj[9] * 5) +
				($cnpj[10] * 4) +
				($cnpj[11] * 3) +
				($cnpj[12] * 2);
	$resto = $soma2 % 11;
	$digito2 = $resto < 2 ? 0 : 11 - $resto;

	return (($cnpj[12] == $digito1) && ($cnpj[13] == $digito2));
}



// chamada para a função (supondo que o CNPJ foi armazenado na variável $cnpj)
// O CNPJ deve conter apenas números (sem barras e pontos)

if (!verificaCNPJ($cnpj))
{
	echo "O CNPJ digitado é inválido";
	exit;
}

?>
