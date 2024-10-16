<?php

require_once('conexao.php');
$conexao = conectadb();

$sql = "SELECT * FROM usuarios";
$result = $conexao->query($sql);
if ($result->num_rows > 0) {
    $usuarioEncontrado = false; 
    while ($linha = $result->fetch_assoc()) {
        if (isset($_POST['usuario']) && isset($_POST['senha']) && 
            $_POST['usuario'] === $linha['user'] && $_POST['senha'] === $linha['senha']) {
            $usuarioEncontrado = true; 
            header('Location: menu.php');
            exit();
        }
    }
    if (!$usuarioEncontrado) {
        header('Location: index.php?msg=1');
    }
} else {
    header('Location: index.php?msg=1');
}

?>
