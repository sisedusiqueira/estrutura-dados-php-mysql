<html>
<head>
<title>Livro de PHP - Upload de arquivo por FTP</title>
</head>
<body>
<h2 align="center">Upload de Arquivos</h2>

<?php
// elimina o limite de tempo de execu��o
set_time_limit (0);

// inclui o arquivo com as configura��es
include 'config_upload_ftp.inc';


$nome_arquivo = $_FILES['arquivo']['name'];
$tamanho_arquivo = $_FILES['arquivo']['size'];
$arquivo_temporario = $_FILES['arquivo']['tmp_name'];

if (!empty ($nome_arquivo))
{
	if ($sobrescrever == "nao" && file_exists("$caminho_absoluto/$nome_arquivo"))
		die("Arquivo j� existe.");

	if (($limitar_tamanho == "sim") && ($tamanho_arquivo > $tamanho_bytes))
		die("Arquivo deve ter no m�ximo $tamanho_bytes bytes.");

	$ext = strrchr($nome_arquivo,'.');
	if ($limitar_ext == "sim" && !in_array($ext,$extensoes_validas))
		die("Extens�o de arquivo inv�lida para upload.");

    // abre uma conex�o FTP
    $id_conexao = ftp_connect($servidor_ftp);

        // realiza o login com o nome de usu�rio e senha
        $login = ftp_login($id_conexao, $usario_ftp, $senha_ftp);

        // verifica se houve sucesso na conex�o
        if ((!$id_conexao) || (!$login))
        {
            echo "N�o foi poss�vel abrir uma conex�o FTP com o servidor $servidor_ftp";
            exit();
        }
        else
            echo "<p align='center'>Usu�rio $usario_ftp conectado ao servidor $servidor_ftp</p>";

        // faz o upload do arquivo
        $arquivo_destino = "$caminho_absoluto/$nome_arquivo";
        $upload = ftp_put($id_conexao, $arquivo_destino, $arquivo_temporario, FTP_BINARY);

        // verifica se houve sucesso no upload
        if (!$upload)
            echo "<p align='center'>O upload do arquivo $nome_arquivo falhou!</p>";
        else
        {
            echo "<p align='center'>O upload do arquivo $nome_arquivo foi conclu�do com sucesso!</p>";
            echo "<p align='center'><a href='upload_ftp.html'>Novo upload</a></p>";
        }

    // Fecha a conex�o FTP
    ftp_close($id_conexao);
}
else
	die("Selecione o arquivo a ser enviado");

?>

</body>
</html>
