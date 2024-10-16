<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
    <script src="js/pesquisa_dinamica.js"></script>
</head>

<body>
    <h1>
        <center>vinicius manoel de souza</center>
    </h1>
    <hr width="100%" align="center" color="blue" size="3">
    <div class="agenda" style="background-color:#FFEAA7;">
        <h2>Agenda Telefonica Completa</h2>

        <?php
        $pesquisa = "";
        if (isset($_GET['pesquisa'])) {
            $pesquisa = $_GET['pesquisa'];
        }
        ?>

        <p align="center">Pesquisa:<input type="text" name="nome" onkeyup="pesquisar(this);" value="<?= htmlspecialchars($pesquisa) ?>"
                onfocus="var temp_value=this.value; this.value=''; this.value=temp_value;" autofocus /></p>

        <center>
            <table>
                <tr>
                    <th style="background-color:#FDCB6E">ID</th>
                    <th style="background-color:#FDCB6E">Primeiro Nome</th>
                    <th style="background-color:#FDCB6E">Sobre-Nome</th>
                    <th style="background-color:#FDCB6E">Email</th>
                    <th style="background-color:#FDCB6E">Telefone</th>
                </tr>
                <tbody>
                    <?php
                    $conexao = new mysqli("127.0.0.1", "root", "", "agenda_telefonica");
                    if ($conexao->connect_errno) {
                        echo "Ocorreu um erro de conexão com o Banco de Dados";
                        exit;
                    }
                    $conexao->set_charset("utf8");

                    $sql = "SELECT * FROM agenda_telefonica WHERE primeiro_nome LIKE '%$pesquisa%'";
                    $result = $conexao->query($sql);
                    if ($result->num_rows > 0) {
                        while ($linha = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $linha["id"] . "</td>";
                            echo "<td>" . $linha["primeiro_nome"] . "</td>";
                            echo "<td>" . $linha["sobrenome"] . "</td>";
                            echo "<td>" . $linha["email"] . "</td>";
                            echo "<td>" . $linha["telefone"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'><center>Sem resultados!</center></td></tr>";
                    }
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </center>
        <hr width="100%" align="center" size="3" color="blue">
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
    <h4>
        <center>Senai Norte - Joinvile - SC</center>
    </h4>
</body>

</html>
