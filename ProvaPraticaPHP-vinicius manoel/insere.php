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
    <div class="agenda">
        <h2>Dados Cadastrados com Sucesso!</h2>

        <?php
        //VALIDANDO A EXISTÊNCIA DOS DADOS
        $erro = "";
        if (isset($_POST["id"]) && isset($_POST["primeiro_nome"]) && isset($_POST["sobrenome"]) && isset($_POST["email"]) && isset($_POST["telefone"])) {
            if (empty($_POST["id"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["primeiro_nome"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["sobrenome"])) {
                $erro = "Campo Obrigatório!";
            } elseif (empty($_POST["email"])) {
                $erro = "Campo Obrigatório!"; 
            } elseif (empty($_POST["telefone"])) {
                $erro = "Campo Obrigatório!";
            } else {
                $conexao = new mysqli("127.0.1.1", "root", "", "agenda_telefonica");
                if ($conexao->connect_errno) {
                    echo "Ocorreu um erro na conexão com o Banco de Dados...";
                    exit;
                }
                // VAMOS REALIZAR O CADASTRO OU ALTERAÇÃO DOS DADOS ENVIADOS
                $id = ($_POST["id"]);
                $primeiro_nome = ($_POST["primeiro_nome"]);
                $sobrenome = ($_POST["sobrenome"]);
                $email = ($_POST["email"]);
                $telefone = ($_POST["telefone"]);
                $stmt = $conexao->prepare("INSERT INTO `agenda_telefonica` (`id`,`primeiro_nome`,`sobrenome`,`email`,`telefone`) VALUES (?,?,?,?,?)");
                $stmt->bind_param('sssss', $id, $primeiro_nome, $sobrenome, $email, $telefone);

                if (!$stmt->execute()) {
                    $erro = $stmt->error; 
                } else {
                    $sucesso = "<h1> Inserindo um valor </h1><br>";
                    $sucesso = "<font size='3' face='Arial'> <center> Dados Cadastrado com Sucesso! </center></font>";
                }
            }

            if (!empty($erro)) {
                echo '<div style="color:#F00">' . $erro . '</div><br/></br>';
            }
            if (isset($sucesso)) {
                echo '<div style="color:#00F">' . $sucesso . '</div><br/></br>'; 
            }
        }
        ?>

        <hr width="100%" align="center" size="3" color="blue">
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
    </div>
    <h4>
        <center>Senai Norte - Joinvile - SC</center>
    </h4>

</body>

</html>
