<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'Conexao.php';

class Cliente
{

    private $CodCliente;
    private $Nome;
    private $Telefone;
    private $Endereco;
    private $RG;
    private $CPF;
    private $conn;

    // ===== Getters & Setters =====

    public function getCodCliente()
    {
        return $this->CodCliente;
    }

    public function setCodCliente($iCodCliente)
    {
        $this->CodCliente = $iCodCliente;
    }
    public function getNome()
    {
        return $this->Nome;
    }

    public function setNome($iNome)
    {
        $this->Nome = $iNome;
    }

    public function getTelefone()
    {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone)
    {
        $this->Telefone = $iTelefone;
    }

    public function getEndereco()
    {
        return $this->Endereco;
    }

    public function setEndereco($iEndereco)
    {
        $this->Endereco = $iEndereco;
    }

    public function getRG()
    {
        return $this->RG;
    }

    public function setRG($iRG)
    {
        $this->RG = $iRG;
    }

    public function getCPF()
    {
        return $this->CPF;
    }

    public function setCPF($iCPF)
    {
        $this->CPF = $iCPF;
    }

    // ===== Métodos =====

    public function buildCliente($data)
    {
        $cliente = new Cliente();

        $cliente->setCodCliente($data["CodCliente"]);
        $cliente->setNome($data["Nome"]);
        $cliente->setTelefone($data["Telefone"]);
        $cliente->setEndereco($data["Endereco"]);
        $cliente->setRG($data["RG"]);
        $cliente->setCPF($data["CPF"]);

        return $cliente;
    }

    function create()
    {
        $Nome = $this->getNome();
        $Telefone = $this->getTelefone();
        $Endereco = $this->getEndereco();
        $RG = $this->getRG();
        $CPF = $this->getCPF();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("insert into cliente values (null, ?,?,?,?,?)");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Telefone, PDO::PARAM_STR);
            @$sql->bindParam(3, $Endereco, PDO::PARAM_STR);
            @$sql->bindParam(4, $RG, PDO::PARAM_STR);
            @$sql->bindParam(5, $CPF, PDO::PARAM_STR);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao inserir cliente." . $exc->getMessage();
        }
    }
    function getAllCliente()
    {
        try {
            $clientes = [];
            $this->conn = new Conexao();
            $sql = $this->conn->query("select * from cliente order by CodCliente");
            $sql->execute();
            $clienteArray = $sql->fetchAll();

            foreach ($clienteArray as $cliente) {
                $clientes[] = $this->buildCliente($cliente);
            }

            return $clientes;

        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getAllCliente. " . $exc->getMessage();
        }
    }
    function getClienteByName($name)
    {
        try {
            $clientes = [];
            $name = '%' . $name . '%';
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from cliente where Nome like ?");
            @$sql->bindParam(1, $name, PDO::PARAM_STR);
            $sql->execute();
            $clienteArray = $sql->fetchAll();

            if ($clienteArray != []) {
                foreach ($clienteArray as $cliente) {
                    $clientes[] = $this->buildCliente($cliente);
                }
            }

            return $clientes;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getClienteByName." . $exc->getMessage();
        }
    }

    function getClienteByCod($cod)
    {
        try {
            $cliente = false;
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from cliente where CodCliente like ?");
            @$sql->bindParam(1, $cod, PDO::PARAM_STR);
            $sql->execute();
            $clienteData = $sql->fetch();

            if ($clienteData != "") {
                $cliente = $this->buildCliente($clienteData);
            }

            return $cliente;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getClienteByCod." . $exc->getMessage();
        }
    }

    function update()
    {
        $CodCliente = $this->getCodCliente();
        $Nome = $this->getNome();
        $Telefone = $this->getTelefone();
        $Endereco = $this->getEndereco();
        $RG = $this->getRG();
        $CPF = $this->getCPF();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("update cliente set Nome = ?, Telefone = ?, Endereco = ?, RG = ?, CPF = ? where CodCliente = ?");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Telefone, PDO::PARAM_STR);
            @$sql->bindParam(3, $Endereco, PDO::PARAM_STR);
            @$sql->bindParam(4, $RG, PDO::PARAM_STR);
            @$sql->bindParam(5, $CPF, PDO::PARAM_STR);
            @$sql->bindParam(6, $CodCliente, PDO::PARAM_INT);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao atualizar cliente." . $exc->getMessage();
        }
    }

    function delete()
    {
        $CodCliente = $this->getCodCliente();
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM cliente WHERE CodCliente = ?");
            $sql->bindParam(1, $CodCliente, PDO::PARAM_INT);
            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao atualizar funcionario." . $exc->getMessage();
        }
    }

}
?>
<script type="text/javascript">
    function sucess(titulo) {
        $(document).ready(function () {
            Swal.fire({
                title: titulo,
                footer: mensagemErro,

                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "../img/roxo.gif",
                imageWidth: 200,
                imageAlt: "Roxo",

                background: "#100d16",
            })
        });
    }

    function error(titulo, msg = '') {
        $(document).ready(function () {
            Swal.fire({
                title: titulo,
                footer: msg,

                confirmButtonColor: " #1f945d",
                color: "#201b2c",

                imageUrl: "../img/peixinho.gif",
                imageWidth: 200,
                imageAlt: "Peixe colorido",

                background: "#100d16",
            })
        });
    }
</script>