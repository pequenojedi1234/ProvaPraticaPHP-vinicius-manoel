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
    
    <div class="agenda" style="background-color:#FFEAA7;"> 
        <h2>Alterar Contato</h2>
        <form method="POST">
            <label>Pesquisa</label>
            <input type="text" name="nome">
        </form>

        <table class="tabela" align="center" border="1">
            <tr>
                <th>ID</th>
                <th>Primeiro Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th></th>
            </tr> 

            <?php
            require_once("conexao.php");
            $conexao = conectadb();
            $conexao->set_charset("utf8");

            if (isset($_POST['nome'])) {
                $nome = $_POST['nome'];
                $sql = "SELECT * FROM agenda_telefonica WHERE primeiro_nome LIKE '%$nome%'";
            } else {
                $sql = "SELECT * FROM agenda_telefonica ORDER BY primeiro_nome ASC";
            }

            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($linha = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $linha["id"] . "</td>";
                    echo "<td>" . $linha["primeiro_nome"] . "</td>";
                    echo "<td>" . $linha["sobrenome"] . "</td>";
                    echo "<td>" . $linha["email"] . "</td>";
                    echo "<td>" . $linha["telefone"] . "</td>";
                    echo "<td><a href='form_alterar.php?id=" . $linha["id"] . "'>Alterar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Sem Resultado</td></tr>";
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

    <h4 style="text-align: center;">Senai Norte - Joinville - SC</h4>
</body>

</html>
