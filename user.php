<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de controle de veiculos</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <h1>Lista dos clientes cadastrados pelo administrador</h1>
        <table>
            <tr id="titulo">
                <td>Nome</td>
                <td>Carro</td>
                <td colspan="2">Empresa</td>
            </tr>
            <?php
                include_once 'config.php';
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
                    echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>
