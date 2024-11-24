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

    public function getCodFuncionario()
    {
        return $this->CodFuncionario;
    }

    public function setCodFuncionario($iCodFuncionario)
    {
        $this->CodFuncionario = $iCodFuncionario;
    }


    // ===== Métodos =====

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