<head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'Conexao.php';

class Funcionario {
    
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
    { return $this->CodFuncionario; }

    public function setCodFuncionario($iCodFuncionario)
    { $this->CodFuncionario = $iCodFuncionario; }
    

    // ===== Métodos =====

    function login() {}
    function create() {}
    function read() {}
    function update() {}
    function delete() {}

}