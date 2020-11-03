<?php
    include_once "config.php";
    if (!empty($_POST["usuario"]) && !empty($_POST["senha"])) {
        $a = new BDConexao();
        $retorno = $a->Logar();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de controle de veiculos</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form method="POST">
            <h1>Login</h1>
            <?php
                if (!empty($retorno)) {
                    echo "<p>$retorno</p>";
                }
            ?>
            <label for="valor1">Usuario</label>
            <input type="text" id="valor1" name="usuario" required>
            <label for="valor2">Senha</label>
            <input type="password" id="valor2" name="senha" required>
            <input type="submit" value="Enviar" name="envio">
        </form>
    </body>
</html>
