<?php
include_once '../classes/Produto.php';
$activePage = 'Crud1';
$produtoClass = new Produto();
$CodProduto = '';
$Nome = '';
$Preco = '';
$CodTipoProduto = '';
$CodFornecedor = '';
$NomePesquisa = '';

if (isset($_GET['pesquisar'])) {
  $NomePesquisa = $_GET['pesquisar'];
  $produtos = $produtoClass->getProdutoByName($NomePesquisa);
} else {
  $produtos = $produtoClass->getAllProduto();
}

if (isset($_GET['visualizar'])) {
  $ProdutoVisualizar = $produtoClass->getProdutoByCod($_GET['visualizar']);
  if ($ProdutoVisualizar) {
    $CodProduto = $ProdutoVisualizar->getCodProduto();
    $Nome = $ProdutoVisualizar->getNome();
    $Preco = $ProdutoVisualizar->getPreco();
    $CodTipoProduto = $ProdutoVisualizar->getCodTipoProd();
    $CodFornecedor = $ProdutoVisualizar->getCodFornecedor();
  }
}

extract($_POST, EXTR_OVERWRITE);
if (isset($cadastrar)) {
  $produtoClass->setCodProduto($_POST["CodProduto"]);
  $produtoClass->setNome($_POST["Nome"]);
  $produtoClass->setPreco($_POST["Preco"]);
  $produtoClass->setCodTipoProd($_POST["CodTipoProd"]);
  $produtoClass->setCodFornecedor($_POST["CodFornecedor"]);

  $produtoClass->create();
  header("Refresh:0");
}
// alterar 
else if (isset($alterar)) {
  $produtoClass->setCodProduto($_POST["CodProduto"]);
  $produtoClass->setNome($_POST["Nome"]);
  $produtoClass->setPreco($_POST["Preco"]);
  $produtoClass->setCodTipoProd($_POST["CodTipoProd"]);
  $produtoClass->setCodFornecedor($_POST["CodFornecedor"]);

  $produtoClass->update();
  header("Refresh:0");

} else if (isset($excluir)) {
  $produtoClass->setCodProduto($_POST["CodProduto"]);
  $produtoClass->delete();
  header("Refresh:0");

} else if (isset($pesquisar)) {
  $NomePesquisa = $_POST["pesquisa"];
  header("Location: crud1.php?pesquisar=$NomePesquisa");

} else if (isset($limpar)) {

  header("Location: crud1.php");
}
?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="stylesheet" href="../css/crud.css" />
  <title>Produto</title>
</head>

<body>
  <?php
  require_once("../components/navbar.php");
  ?>
  <main class="container">
    <h1>Informações</h1>

    <!-- começo do formulario -->
    <form name="form-crud" method="POST" class="form-crud">
      <div class="input-grid">
        <div class="input-row">
          <div class="input-div inputdisabled">
            <label for="CodProduto">CodProduto</label>
            <input placeholder="0" type="number" name="CodProduto" id="CodProduto"
              value="<?= ($CodProduto != '') ? $CodProduto : '' ?>" tabindex="-1">
          </div>
          <div class="input-div">
            <label for="Nome">Nome</label>
            <input placeholder="Nome" type="text" maxlength="35" name="Nome" id="Nome"
              value="<?= ($Nome != '') ? $Nome : '' ?>" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Preco">Preco</label>
            <input placeholder="Preço" type="number" name="Preco" id="Preco" value="<?= ($Preco != '') ? $Preco : '' ?>"
              required>
          </div>
          <div class="input-div">
            <label for="CodTipoProd">CodTipoProd</label>
            <input placeholder="0" type="number" name="CodTipoProd" id="CodTipoProd"
              value="<?= ($CodTipoProduto != '') ? $CodTipoProduto : '' ?>" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="CodFornecedor">CodFornecedor</label>
            <input placeholder="0" type="number" name="CodFornecedor" id="CodFornecedor"
              value="<?= ($CodFornecedor != '') ? $CodFornecedor : '' ?>" required>
          </div>
        </div>
      </div>

      <div class="button-column">
        <button name="cadastrar" type="submit">Cadastrar</button>
        <button name="alterar" type="submit">Alterar</button>
        <button name="excluir" type="submit">Excluir</button>
        <button name="limpar" type="submit">Limpar</button>
      </div>

    </form>
    <!-- fim do formulario -->

    <div class="crud-table-div">
      <form class="pesquisar-div" method="POST">
        <h1>Produtos</h1>
        <button name="pesquisar" type="submit">Pesquisar</button>
        <input placeholder="Nome do produto" type="text" name="pesquisa" id="pesquisa" value="<?php if (isset($_GET['pesquisar'])) {
          echo $NomePesquisa;
        } ?>" required>
      </form>
      <div class="crud-frame">
        <?php if ($produtos != []) { ?>
          <table class="crud-table fl-table">
            <thead>
              <tr>
                <th>CodProduto</th>
                <th>Nome</th>
                <th>Preco</th>
                <th>CodTipoProd</th>
                <th>CodFornecedor</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($produtos as $produto): ?>
                <tr>
                  <td><?= $produto->getCodProduto() ?></td>
                  <td><?= $produto->getNome() ?></td>
                  <td><?= $produto->getPreco() ?></td>
                  <td><?= $produto->getCodTipoProd() ?></td>
                  <td><?= $produto->getCodFornecedor() ?></td>
                  <td>
                    <form action="crud1.php?visualizar=<?= $produto->getCodProduto() ?>&pesquisar=<?= $NomePesquisa ?>"
                      method="POST">
                      <button type="submit" name="visualizar">Visualizar</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php } else { ?>
          <p>Nenhum Registro Encontrado</p>
        <?php } ?>
      </div>
    </div>
  </main>

</body>


</html>