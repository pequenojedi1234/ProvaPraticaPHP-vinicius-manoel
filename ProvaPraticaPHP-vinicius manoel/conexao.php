<?php
/*
ESSE ARQUIVO É RESPONSAVEL POR REALIZAR A CONEXAO
COM BANCO DE DADOS
*/
$nomeServidor = "SERVIDOR"; 
$usuario = "USUARIO";
$senha = "SENHA";
$bancoDeDados = "agenda_telefonica";

// CRIA A CONEXAO:
$conn = mysqli_connect($nomeServidor, $usuario, $senha, $bancoDeDados);

// VERIFICA A CONEXAO:

/*
if (!$conn){
    die("Conexão falhou: " . mysqli_connect_error());
} else {
    echo "Conectado com sucesso";
}
*/

mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
function conectadb()
{
    $endereco = "SERVIDOR"; 
    $usuario = "USUARIO";
    $senha = "SENHA";
    $banco = "agenda_telefonica";

    try {
        $conn = new mysqli($endereco, $usuario, $senha, $banco);

        if ($conn->connect_error) { 
            throw new Exception("Falha na conexão: " . $conn->connect_error);
        }

        return $conn;
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage(); 
    }
}
?>
