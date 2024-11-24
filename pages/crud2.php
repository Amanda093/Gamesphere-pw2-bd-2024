<?php
include_once '../classes/Cliente.php';
$activePage = 'Crud2';
$clienteClass = new Cliente();

$CodCliente = '';
$Nome = '';
$Telefone = '';
$Endereco = '';
$RG = '';
$CPF = '';
$NomePesquisa = '';

if (isset($_GET['pesquisar'])) {
  $NomePesquisa = $_GET['pesquisar'];
  $clientes = $clienteClass->getClienteByName($NomePesquisa);
} else {
  $clientes = $clienteClass->getAllCliente();
}

if (isset($_GET['visualizar'])) {
  $ClienteVisualizar = $clienteClass->getClienteByCod($_GET['visualizar']);
  if ($ClienteVisualizar) {
    $CodCliente = $ClienteVisualizar->getCodCliente();
    $Nome = $ClienteVisualizar->getNome();
    $Telefone = $ClienteVisualizar->getTelefone();
    $Endereco = $ClienteVisualizar->getEndereco();
    $RG = $ClienteVisualizar->getRG();
    $CPF = $ClienteVisualizar->getCPF();
  }
}

extract($_POST, EXTR_OVERWRITE);
if (isset($cadastrar)) {
  $clienteClass->setCodCliente($_POST["CodCliente"]);
  $clienteClass->setNome($_POST["Nome"]);
  $clienteClass->setTelefone($_POST["Telefone"]);
  $clienteClass->setEndereco($_POST["Endereco"]);
  $clienteClass->setRG($_POST["RG"]);
  $clienteClass->setCPF($_POST["CPF"]);

  $clienteClass->create();
  header("Refresh:0");
}
// alterar 
else if (isset($alterar)) {
  $clienteClass->setCodCliente($_POST["CodCliente"]);
  $clienteClass->setNome($_POST["Nome"]);
  $clienteClass->setTelefone($_POST["Telefone"]);
  $clienteClass->setEndereco($_POST["Endereco"]);
  $clienteClass->setRG($_POST["RG"]);
  $clienteClass->setCPF($_POST["CPF"]);

  $clienteClass->update();
  header("Refresh:0");

} else if (isset($excluir)) {
  $clienteClass->setCodCliente($_POST["CodCliente"]);
  $clienteClass->delete();
  header("Refresh:0");

} else if (isset($pesquisar)) {
  $NomePesquisa = $_POST["pesquisa"];
  header("Location: crud2.php?pesquisar=$NomePesquisa");

} else if (isset($limpar)) {

  header("Location: crud2.php");
}
?>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="icon" href="../img/gamesphere.ico" />
  <link rel="stylesheet" href="../css/crud.css" />
  <title>Cliente</title>
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
            <label for="CodCliente">CodCliente</label>
            <input type="number" placeholder="0" name="CodCliente" id="CodCliente"
              value="<?= ($CodCliente != '') ? $CodCliente : '' ?>" tabindex="-1">
          </div>
          <div class="input-div">
            <label for="Nome">Nome</label>
            <input type="text" placeholder="Nome do cliente" maxlength="35" name="Nome" id="Nome"
              value="<?= ($Nome != '') ? $Nome : '' ?>" required>
          </div>
        </div>

        <div class=" input-row">
          <div class="input-div">
            <label for="Telefone">Telefone</label>
            <input type="text" name="Telefone" placeholder="00000-0000" id="Telefone"
              value="<?= ($Telefone != '') ? $Telefone : '' ?>" required>
          </div>
          <div class=" input-div">
            <label for="Endereco">Endereço</label>
            <input type="text" name="Endereco" id="Endereco" maxlength="80" placeholder="Endereço do cliente"
              value="<?= ($Endereco != '') ? $Endereco : '' ?>" required>
          </div>
        </div>

        <div class=" input-row">
          <div class="input-div">
            <label for="RG">RG</label>
            <input type="text" name="RG" id="RG" placeholder="00.000.000-0" value="<?= ($RG != '') ? $RG : '' ?>"
              required>
          </div>
          <div class=" input-div">
            <label for="CPF">CPF</label>
            <input type="text" name="CPF" id="CPF" placeholder="000.000.000-00" value="<?= ($CPF != '') ? $CPF : '' ?>"
              required>
          </div>
        </div>
      </div>

      <div class=" button-column">
        <button name="cadastrar" type="submit">Cadastrar</button>
        <button name="alterar" type="submit">Alterar</button>
        <button name="excluir" type="submit">Excluir</button>
        <button name="limpar" type="submit">Limpar</button>
      </div>

    </form>
    <!-- fim do formulario -->

    <div class="crud-table-div">
      <form class="pesquisar-div" method="POST">
        <h1>Clientes</h1>
        <button name="pesquisar" type="submit">Pesquisar</button>
        <input placeholder="Nome do cliente" type="text" name="pesquisa" id="pesquisa" value="<?php if (isset($_GET['pesquisar'])) {
          echo $NomePesquisa;
        } ?>" required>
      </form>
      <div class="crud-frame">
        <?php if ($clientes != []) { ?>
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
              <?php
              foreach ($clientes as $cliente): ?>
                <tr>
                  <td><?= $cliente->getCodCliente() ?></td>
                  <td><?= $cliente->getNome() ?></td>
                  <td><?= $cliente->getTelefone() ?></td>
                  <td><?= $cliente->getEndereco() ?></td>
                  <td><?= $cliente->getRG() ?></td>
                  <td><?= $cliente->getCPF() ?></td>
                  <td>
                    <form action="crud2.php?visualizar=<?= $cliente->getCodCliente() ?>&pesquisar=<?= $NomePesquisa ?>"
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


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
  $("#Telefone").mask("00000-0000");
  $("#RG").mask("00.000.000-0");
  $("#CPF").mask("000.000.000-00");
</script>

</html>