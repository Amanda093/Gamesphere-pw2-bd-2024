<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="stylesheet" href="../css/crud.css" />
  <title>Cliente</title>
</head>

<body>
  <?php
  $activePage = 'Crud2';
  require_once("../components/navbar.php");
  ?>

  <main class="container">
    <h1>Informações</h1>

    <form name="form-crud" method="POST" class="form-crud">
      <div class="input-grid">
        <div class="input-row">
          <div class="input-div">
            <label for="CodCliente">CodCliente</label>
            <input type="number" name="CodCliente" id="CodCliente">
          </div>
          <div class="input-div">
            <label for="Nome">Nome</label>
            <input type="text" name="Nome" id="Nome">
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Telefone">Telefone</label>
            <input type="number" name="Telefone" id="Telefone">
          </div>
          <div class="input-div">
            <label for="Endereco">Endereço</label>
            <input type="text" name="Endereco" id="Endereco">
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="RG">RG</label>
            <input type="number" name="RG" id="RG">
          </div>
          <div class="input-div">
            <label for="CPF">CPF</label>
            <input type="number" name="CPF" id="CPF">
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
        <h1>Clientes</h1>
        <button name="pesquisar" type="submit">Pesquisar</button>
        <input type="text" name="pesquisa" id="pesquisa">
      </form>
      <div class="crud-frame">
        <table class="crud-table fl-table">
          <thead>
            <tr>
              <th>CodCliente</th>
              <th>Nome</th>
              <th>Telefone</th>
              <th>Endereço</th>
              <th>RG</th>
              <th>CPF</th>
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