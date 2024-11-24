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
    function create()
    {
    }
    function read()
    {
    }
    function update()
    {
    }
    function delete()
    {
    }

}