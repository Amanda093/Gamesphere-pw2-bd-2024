<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="stylesheet" href="../css/crud.css" />
  <title>Fornecedor</title>
</head>

<body>
  <?php
  $activePage = 'Crud3';
  require_once("../components/navbar.php");
  ?>

<main class="container">
    <h1>Informações</h1>
    <form name="form-crud" method="POST" class="form-crud">
      <div class="input-grid">
        <div class="input-row">
          <div class="input-div">
            <label for="CodFornecedor">CodFornecedor</label>
            <input type="number" name="CodFornecedor" id="CodFornecedor">
          </div>
          <div class="input-div">
            <label for="Nome">Nome</label>
            <input type="text" name="Nome" id="Nome">
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="CNPJ">CNPJ</label>
            <input type="number" name="CNPJ" id="CNPJ">
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Endereco">Endereço</label>
            <input type="number" name="Endereco" id="Endereco">
          </div>
          <div class="input-div">
            <label for="Telefone">Telefone</label>
            <input type="number" name="Telefone" id="Telefone">
          </div>
        </div>
      </div>

      <div class="button-column">
        <button name="cadastrar" type="submit">Cadastrar</button>
        <button name="alterar" type="submit">Alterar</button>
        <button name="excluir" type="submit">Excluir</button>
        <button name="limpar" type="reset">Limpar</button>
      </div>

    </form>

    <div class="crud-table-div">
      <form class="pesquisar-div" method="POST">
        <h1>Fornecedores</h1>
        <button name="pesquisar" type="submit">Pesquisar</button>
        <input type="text" name="pesquisa" id="pesquisa">
      </form>
      <div class="crud-frame">
        <table class="crud-table fl-table">
          <thead>
            <tr>
              <th>CodFornecedor</th>
              <th>Nome</th>
              <th>CNPJ</th>
              <th>Telefone</th>
              <th>Endereço</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
            <tr>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
              <td>aaaaaa</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<?php
extract($_POST, EXTR_OVERWRITE);
if (isset($cadastrar)) {
  echo 'cadastrar';
} else if (isset($alterar)) {
  echo 'alterar';
} else if (isset($excluir)) {
  echo 'excluir';
} else if (isset($pesquisar)) {
  echo 'pesquisar';
}
?>
</body>

</html>