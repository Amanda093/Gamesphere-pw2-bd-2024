<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<?php

include_once 'Conexao.php';

class Produto
{

    private $CodProduto;
    private $Nome;
    private $Preco;
    private $CodTipoProd;
    private $CodFornecedor;
    private $conn;

    // ===== Getters & Setters =====

    public function getCodProduto()
    {
        return $this->CodProduto;
    }
    public function setCodProduto($iCodProduto)
    {
        $this->CodProduto = $iCodProduto;
    }

    public function getNome()
    {
        return $this->Nome;
    }
    public function setNome($iNome)
    {
        $this->Nome = $iNome;
    }

    public function getPreco()
    {
        return $this->Preco;
    }
    public function setPreco($iPreco)
    {
        $this->Preco = $iPreco;
    }

    public function getCodTipoProd()
    {
        return $this->CodTipoProd;
    }
    public function setCodTipoProd($iCodTipoProd)
    {
        $this->CodTipoProd = $iCodTipoProd;
    }

    public function getCodFornecedor()
    {
        return $this->CodFornecedor;
    }
    public function setCodFornecedor($iCodFornecedor)
    {
        $this->CodFornecedor = $iCodFornecedor;
    }


    // ===== Métodos =====

    public function buildProduto($data)
    {
        $produto = new Produto();

        $produto->setCodProduto($data["CodProduto"]);
        $produto->setNome($data["Nome"]);
        $produto->setPreco($data["Preco"]);
        $produto->setCodTipoProd($data["CodTipoProd"]);
        $produto->setCodFornecedor($data["CodFornecedor"]);

        return $produto;
    }

    function create()
    {
        $Nome = $this->getNome();
        $Preco = $this->getPreco();
        $CodTipoProd = $this->getCodTipoProd();
        $CodFornecedor = $this->getCodFornecedor();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("insert into produto values (null, ?,?,?,?)");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Preco, PDO::PARAM_STR);
            @$sql->bindParam(3, $CodTipoProd, PDO::PARAM_INT);
            @$sql->bindParam(4, $CodFornecedor, PDO::PARAM_INT);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao inserir produto." . $exc->getMessage();
        }
    }
    function getAllProduto()
    {
        try {
            $produtos = [];
            $this->conn = new Conexao();
            $sql = $this->conn->query("select * from produto order by CodProduto");
            $sql->execute();
            $produtoArray = $sql->fetchAll();

            foreach ($produtoArray as $produto) {
                $produtos[] = $this->buildProduto($produto);
            }

            return $produtos;

        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getAllProduto. " . $exc->getMessage();
        }
    }
    function getProdutoByName($name)
    {
        try {
            $produtos = [];
            $name = '%' . $name . '%';
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from produto where Nome like ?");
            @$sql->bindParam(1, $name, PDO::PARAM_STR);
            $sql->execute();
            $produtoArray = $sql->fetchAll();

            if ($produtoArray != []) {
                foreach ($produtoArray as $produto) {
                    $produtos[] = $this->buildProduto($produto);
                }
            }

            return $produtos;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getProdutoByName." . $exc->getMessage();
        }
    }

    function getProdutoByCod($cod)
    {
        try {
            $produto = false;
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("select * from produto where CodProduto like ?");
            @$sql->bindParam(1, $cod, PDO::PARAM_STR);
            $sql->execute();
            $produtoData = $sql->fetch();

            if ($produtoData != "") {
                $produto = $this->buildProduto($produtoData);
            }

            return $produto;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta getProdutoByCod." . $exc->getMessage();
        }
    }
    function update()
    {
        $CodProduto = $this->getCodProduto();
        $Nome = $this->getNome();
        $Preco = $this->getPreco();
        $CodTipoProd = $this->getCodTipoProd();
        $CodFornecedor = $this->getCodFornecedor();

        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("update produto set Nome = ?, Preco = ?, CodTipoProd = ?, CodFornecedor =? where CodProduto = ?");
            @$sql->bindParam(1, $Nome, PDO::PARAM_STR);
            @$sql->bindParam(2, $Preco, PDO::PARAM_STR);
            @$sql->bindParam(3, $CodTipoProd, PDO::PARAM_INT);
            @$sql->bindParam(4, $CodFornecedor, PDO::PARAM_INT);
            @$sql->bindParam(5, $CodProduto, PDO::PARAM_INT);

            $sql->execute();
        } catch (PDOException $exc) {
            echo "Erro ao inserir produto." . $exc->getMessage();
        }
    }
    function delete()
    {
        $CodProduto = $this->getCodProduto();
        try {
            $this->conn = new Conexao();
            $sql = $this->conn->prepare("DELETE FROM produto WHERE CodProduto = ?");
            $sql->bindParam(1, $CodProduto, PDO::PARAM_INT);
            $sql->execute();
            return "Excluído com sucesso!";
        } catch (PDOException $exc) {
            return '
                <script type="text/javascript">
                    error("Excluido com sucesso!");
                </script>
                ';
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