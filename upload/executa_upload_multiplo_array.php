<html>
<head>
<title>Livro de PHP - Upload de múltiplos arquivos</title>
</head>
<body>
<h2 align="center">Upload de múltiplos arquivos</h2>

<?
// elimina o limite de tempo de execução
set_time_limit (0);

// inclui o arquivo com as configurações
include 'config_upload.inc';

// repete os mesmos comandos para os 5 arquivos
for ($i=0 ; $i<5 ; $i++)
{
    $erro = FALSE;
    $nome_arquivo = $_FILES['arquivo']['name'][$i];
    $tamanho_arquivo = $_FILES['arquivo']['size'][$i];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'][$i];

    if (!empty ($nome_arquivo))
    {
    	if ($sobrescrever == "nao" && file_exists("$caminho_absoluto/$nome_arquivo"))
    	{
            $erro = TRUE;
    		echo "Arquivo $nome_arquivo já existe.";
   		}

    	if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes))
        {
            $erro = TRUE;
    		echo "Arquivo $nome_arquivo deve ter no máximo $tamanho_bytes bytes.";
   		}

    	$ext = strrchr($nome_arquivo,'.');
    	if ($limitar_ext == "sim" && !in_array($ext,$extensoes_validas))
    	{
            $erro = TRUE;
    		echo "Extensão do arquivo $nome_arquivo inválida para upload.";
   		}

    	if(!$erro && move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo"))
    		echo "<p align=center>O upload do arquivo <b>$nome_arquivo</b> foi concluído com sucesso.</p>";
    	else
    		echo "<p align=center>O arquivo $nome_arquivo não pôde ser copiado para o servidor.</p>";
    }
}

?>

</body>
</html>
