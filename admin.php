<?php
    include_once 'config.php';
    if (!empty($_POST["nome"]) && !empty($_POST["carro"]) && !empty($_POST["empresa"])) {
        $a = new BDConexao();
        $a->Cadastrar();
    }
    if (isset($_GET["id"])) {
        $a = new BDConexao();
        $a->Excluir();
        header("Location: admin.php");
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
        <div id="esquerda">
            <form method="POST">
                <h1>Cadastro do Cliente</h1>
                <label for="valor1">Nome:</label>
                <input type="text" id="valor1" name="nome" required>
                <label for="valor2">Carro:</label>
                <input type="text" id="valor2" name="carro" required>
                <label for="valor3">Empresa:</label>
                <input type="text" id="valor3" name="empresa" required>  
                <input type="submit" value="Cadastrar" name="envio">
            </form>
        </div>
        <div id="direita">
            <table>
                <tr id="titulo">
                    <td>Nome</td>
                    <td>Carro</td>
                    <td colspan="2">Empresa</td>
                </tr>
            <?php
                $a = new BDConexao();
                $retorno = $a->Buscar();
                if (count($retorno) > 0) {
                    for ($contador = 0; $contador < count($retorno); $contador++) {
                        echo "<tr>";
                        foreach ($retorno[$contador] as $chave => $valor) {
                            if ($chave != "id") {
                                echo "<td>$valor</td>";
                            }
                        }
            ?>
                    <td>
                        <a href="admin.php?id=<?php echo $retorno[$contador]['id'] ?>">Excluir</a>
                    </td>
            <?php
                    echo "</tr>";
                    }
                }
            ?>
            </table>
        </div>
    </body>
</html>
