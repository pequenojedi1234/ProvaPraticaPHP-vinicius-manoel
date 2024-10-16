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
    <h1 style="text-align: center;">vinicius manoel de souza</h1> 
    <hr width="100%" align="center" color="blue" size="3">
    <div class="agenda" style="background-color:#FFEAA7; border: 3px solid;">
        <h2>Agenda Telefonica Completa</h2>
        <form method="POST" action="busca.php">
            <p align="center">Pesquisa: <input type="text" name="nome" /></p>
        </form>

        <table align="center" border="1">
            <tr>
                <th style="background-color:#FDCB6E">Primeiro Nome</th>
            </tr>

            <?php
            $conexao = new mysqli("127.0.0.1", "root", "", "agenda_telefonica");
            if ($conexao->connect_errno) {
                echo "Ocorreu um erro de conexão com o Banco de Dados";
                exit;
            }
            $conexao->set_charset("utf8");

            if (!empty($_POST['nome'])) {  
                $pesquisa = $conexao->real_escape_string($_POST['nome']);  
                $sql = "SELECT * FROM agenda_telefonica WHERE primeiro_nome LIKE '%$pesquisa%'";
            } else {
                $sql = "SELECT * FROM agenda_telefonica";
            }

            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha["primeiro_nome"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>Sem resultados!</td></tr>";
            }
            $conexao->close();
            ?>
        </table>

        <div class="agenda1">
            <hr width="100%" align="center" size="3" color="blue"> 

            <div id="container">
                <table align="center">
                    <tr>
                        <td>
                            <form method="POST" action="form.php">
                                <center>
                                    <input type="submit" value="Novo Cadastro">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <center>
                                    <input type="submit" value="Listar Nome">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome_sobrenome.php">
                                <center>
                                    <input type="submit" value="Listar Nome e Sobrenome">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="listar_agenda_completa.php">
                                <center>
                                    <input type="submit" value="Listar Agenda Telefone">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="mostrar_nome.php">
                                <center>
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
                                <center>
                                    <input type="submit" value="Home">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="alterar_contato.php">
                                <center>
                                    <input type="submit" value="Alterar Contato">
                                </center>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="procura_deletar.php">
                                <center>
                                    <input type="submit" value="Excluir Contato">
                                </center>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <h4 style="text-align: center;">Senai Norte - Joinvile - SC</h4> 
</body>

</html>
