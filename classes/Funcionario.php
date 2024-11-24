<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'Conexao.php';

class Funcionario
{

    private $CodFuncionario;
    private $Nome;
    private $Salario;
    private $Email;
    private $Telefone;
    private $RG;
    private $CPF;
    private $Usuario;
    private $Senha;
    private $conn;

    // ===== Getters & Setters =====

    public function getCodFuncionario()
    {
        return $this->CodFuncionario;
    }

    public function setCodFuncionario($iCodFuncionario)
    {
        $this->CodFuncionario = $iCodFuncionario;
    }

    public function getNome()
    {
        return $this->Nome;
    }

    public function setNome($iNome)
    {
        $this->Nome = $iNome;
    }

    public function getSalario()
    {
        return $this->Salario;
    }

    public function setSalario($iSalario)
    {
        $this->Salario = $iSalario;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($iEmail)
    {
        $this->Email = $iEmail;
    }

    public function getTelefone()
    {
        return $this->Telefone;
    }

    public function setTelefone($iTelefone)
    {
        $this->Telefone = $iTelefone;
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

    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function setUsuario($iUsuario)
    {
        $this->Usuario = $iUsuario;
    }

    public function getSenha()
    {
        return $this->Senha;
    }

    public function setSenha($iSenha)
    {
        $this->Senha = $iSenha;
    }

    // ===== Métodos =====
    public function buildFuncionario($data)
    {
        $funcionario = new Funcionario();

        $funcionario->setCodFuncionario($data["CodFuncionario"]);
        $funcionario->setNome($data["Nome"]);
        $funcionario->setSalario($data["Salario"]);
        $funcionario->setEmail($data["Email"]);
        $funcionario->setTelefone($data["Telefone"]);
        $funcionario->setRG($data["RG"]);
        $funcionario->setCPF($data["CPF"]);
        $funcionario->setUsuario($data["Usuario"]);
        $funcionario->setSenha($data["Senha"]);

        return $funcionario;
    }

    function login()
    {
        $usuario = $this->getUsuario();
        $senha = $this->getSenha();
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("SELECT Usuario, Senha FROM funcionario WHERE Usuario LIKE ? and Senha = ?");
            $sql->bindParam(1, $usuario, PDO::PARAM_STR);
            $sql->bindParam(2, $senha, PDO::PARAM_INT);
            $sql->execute();
            return $sql->fetch();
        } catch (PDOException $exc) {
            echo 'Erro ao executar login. ' . $exc->getMessage();
        }
    }

    function getAllFuncionario()
    {
        try {
            $funcionarios = [];
            $this->conn = new Conexao();
            $sql = $this->conn->query("select * from funcionario order by CodFuncionario");
            $sql->execute();
            $funcionarioArray = $sql->fetchAll();

            foreach ($funcionarioArray as $funcionario) {
                $funcionarios[] = $this->buildFuncionario($funcionario);
            }

            return $funcionarios;

        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getAllProduto. " . $exc->getMessage();
        }
    }

    function getFuncionarioByName($name)
    {
        try {
            $funcionarios = [];
            $name = '%' . $name . '%';
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from funcionario where Nome like ?");
            @$sql->bindParam(1, $name, PDO::PARAM_STR);
            $sql->execute();
            $funcionarioArray = $sql->fetchAll();

            if ($funcionarioArray != []) {
                foreach ($funcionarioArray as $funcionario) {
                    $funcionarios[] = $this->buildFuncionario($funcionario);
                }
            }

            return $funcionarios;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getFuncionarioByName." . $exc->getMessage();
        }
    }

    function getFuncionarioByCod($cod)
    {
        try {
            $funcionario = false;
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from funcionario where CodFuncionario like ?");
            @$sql->bindParam(1, $cod, PDO::PARAM_STR);
            $sql->execute();
            $funcionarioData = $sql->fetch();

            if ($funcionarioData != "") {
                $funcionario = $this->buildFuncionario($funcionarioData);
            }

            return $funcionario;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getFuncionarioByCod." . $exc->getMessage();
        }
    }
    function create()
    {
        $Nome = $this->getNome();
        $Salario = $this->getSalario();
        $Email = $this->getEmail();
        $Telefone = $this->getTelefone();
        $RG = $this->getRG();
        $CPF = $this->getCPF();
        $Usuario = $this->getUsuario();
        $Senha = $this->getSenha();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("insert into funcionario values (null, ?,?,?,?,?,?,?,?)");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Salario, PDO::PARAM_STR);
            @$sql->bindParam(3, $Email, PDO::PARAM_STR);
            @$sql->bindParam(4, $Telefone, PDO::PARAM_STR);
            @$sql->bindParam(5, $RG, PDO::PARAM_STR);
            @$sql->bindParam(6, $CPF, PDO::PARAM_STR);
            @$sql->bindParam(7, $Usuario, PDO::PARAM_STR);
            @$sql->bindParam(8, $Senha, PDO::PARAM_STR);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao inserir funcionario." . $exc->getMessage();
        }
    }
    function update()
    {
        $CodFuncionario = $this->getCodfuncionario();
        $Nome = $this->getNome();
        $Salario = $this->getSalario();
        $Email = $this->getEmail();
        $Telefone = $this->getTelefone();
        $RG = $this->getRG();
        $CPF = $this->getCPF();
        $Usuario = $this->getUsuario();
        $Senha = $this->getSenha();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("update funcionario set Nome = ?, Salario = ?, Email = ?, Telefone = ?, RG = ?, CPF = ?, Usuario = ?, Senha = ? where CodFuncionario = ?");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Salario, PDO::PARAM_STR);
            @$sql->bindParam(3, $Email, PDO::PARAM_STR);
            @$sql->bindParam(4, $Telefone, PDO::PARAM_STR);
            @$sql->bindParam(5, $RG, PDO::PARAM_STR);
            @$sql->bindParam(6, $CPF, PDO::PARAM_STR);
            @$sql->bindParam(7, $Usuario, PDO::PARAM_STR);
            @$sql->bindParam(8, $Senha, PDO::PARAM_STR);
            @$sql->bindParam(9, $CodFuncionario, PDO::PARAM_STR);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao atualizar funcionario." . $exc->getMessage();
        }
    }

    function delete()
    {
        $CodFuncionario = $this->getCodfuncionario();
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM funcionario WHERE CodFuncionario = ?");
            $sql->bindParam(1, $CodFuncionario, PDO::PARAM_INT);
            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao atualizar funcionario." . $exc->getMessage();
        }
    }

}