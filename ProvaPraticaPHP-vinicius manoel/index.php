<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
    <style>
        
        body {
            text-align: center;
        }

        form {
            display: inline-block;
            margin-top: 20px;
        }

        input {
            margin: 5px;
        }
    </style>
</head>

<body>
    <h1>vinicius manoel de souza</h1>
    <h2>Agenda Telefonica</h2>

   
    <div id="container">
        <form method="POST" action="login.php">
            <input type="text" name="usuario" value="" size="15" placeholder="Usuário" required>
            <input type="password" name="senha" value="" size="15" placeholder="Senha" required>
            <button type="submit">Login</button>
        </form>

       
        <?php if (isset($_GET['msg']) && $_GET['msg'] === '1') {
            echo "<p style='color:red;'>Usuário ou senha incorretos</p>";
        } ?>
    </div>

    <h4>Senai Norte - Joinville - SC</h4>

</body>

</html>
