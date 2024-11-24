<?php

class Conexao extends PDO
{
    private static $instancia;

    // Armazenam as informações de conexão com o banco de dados
    private $db_name = "bd_locadora";   // Nome do Banco de Dados
    private $db_host = "127.0.0.1";     // Host do Banco de Dados
    private $db_user = "root";          // Nome do Usuário
    private $db_pass = "";              // Senha do Usuário
    private $query;

    // Construtor da classe
    public function __construct()
    {
        // Chama o construtor da classe pai (PDO) para estabelecer a conexão
        parent::__construct("mysql:host=$this->db_host;dbname=$this->db_name", "$this->db_user", "$this->db_pass");
    }

    // Método estático para obter a instância única da classe
    public static function getInstance()
    {
        // Verifica se a instância ainda não foi criada
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Conexao; // Cria a nova instância da classe
                echo 'Conectado com sucesso!';
            } catch (Exception $error) {
                echo 'Erro ao conectar';
                exit();
            }
        }
        return self::$instancia;
    }

    // Método para executar uma consulta SQL
    public function sql($query)
    {
        $this->getInstance();
        $this->query = $query;
        $stmt = $pdo->prepare($this->query);
        $stmt->execute();
        $pdo = null;
    }
}

?>