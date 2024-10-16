<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
</head>

<body>
    <h1>
        <center>vinicius manoel de souza</center>
    </h1>
    <hr width="100%" align="center" color="blue" size="3">
    <div class="agenda">
        <h2>Exclusão de Registros</h2>

        <?php
        require_once("conexao.php");
        $conexao = conectadb();
        $conexao->set_charset("utf8");

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM agenda_telefonica WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param('i', $id); 
            if ($stmt->execute()) {
                echo "Registro EXCLUIDO com sucesso!";
            } else {
                echo $stmt->error;
            }
            $stmt->close();
        }
        $conexao->close(); 
        ?>
    </div>

    <div class="agenda1">
        <hr width="100%" align="center" size="3" color="blue"> 

        <div id="container">
            <table align="center">
                <tr>

                    <td>
                        <form method="POST" action="form.php">
                            <center align="right">
                                <input type="submit" value="Novo Cadastro">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome.php">
                            <center align="left">
                                <input type="submit" value="Listar Nome">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome_sobrenome.php">
                            <center align="left">
                                <input type="submit" value="Listar Nome e Sobrenome">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="listar_agenda_completa.php">
                            <center align="right">
                                <input type="submit" value="Listar Agenda Telefone">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome.php">
                            <center align="left">
                                <input type="submit" value="Consultar Nome">
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <hr width="100%" align="center" size="3" color="blue"> 
        <div id="container">
            <table align="center">
                <tr>
                    <td>
                        <form method="POST" action="menu.php">
                            <center align="right">
                                <input type="submit" value="Home">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="alterar_contato.php">
                            <center align="right">
                                <input type="submit" value="Alterar Contato">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="procura_deletar.php">
                            <center align="right">
                                <input type="submit" value="Excluir Contato">
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <h4>
        <center>Senai Norte - Joinvile - SC</center>
    </h4>
</body>

</html>
