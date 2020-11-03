<?php
    
    class BDConexao {
        
        private $conexao;
        private $cadastro;
        private $dados;
        private $excluir;
        private $login;

        function __construct() {
            $this->conexao = new PDO("mysql:dbname=controle_veiculos;host=localhost;charset=utf8", "root", "");
        }

        function Cadastrar() {
            $this->cadastro = $this->conexao->prepare("INSERT INTO clientes VALUES (null, ?, ?, ?)");
            $this->cadastro->execute(array($_POST["nome"], $_POST["carro"], $_POST["empresa"]));
        }

        function Logar() {
            $this->login = $this->conexao->prepare("SELECT id FROM contas WHERE usuario = ? AND senha = ?");
            $this->login->execute(array($_POST["usuario"], $_POST["senha"]));
            $retorno = $this->login->fetchAll();
            if ($retorno[0]["id"] == 1) {
                header("Location: admin.php");
            } elseif ($retorno[0]["id"] == 2) {
                header("Location: user.php");
            } else {
                return "Usuario ou senha incorretos";
            }
        }
        
        function Buscar() {
            $this->dados = $this->conexao->query("SELECT * FROM clientes ORDER BY id");
            $retorno = $this->dados->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        }

        function Excluir() {
            $this->excluir = $this->conexao->prepare("DELETE FROM clientes WHERE id = ?");
            $this->excluir->execute(array($_GET["id"]));
        }

    }

?>
