<?php
include_once '../classes/Funcionario.php';
$activePage = 'Crud3';
$funcionarioClass = new Funcionario();

$CodFuncionario = '';
$Nome = '';
$Salario = '';
$Telefone = '';
$RG = '';
$CPF = '';
$Email = '';
$Usuario = '';
$Senha = '';
$NomePesquisa = '';

if (isset($_GET['pesquisar'])) {
  $NomePesquisa = $_GET['pesquisar'];
  $funcionarios = $funcionarioClass->getFuncionarioByName($NomePesquisa); // TODO
} else {
  $funcionarios = $funcionarioClass->getAllFuncionario(); // TODO
}

if (isset($_GET['visualizar'])) {
  $FuncionarioVisualizar = $funcionarioClass->getFuncionarioByCod($_GET['visualizar']); // TODO
  if ($FuncionarioVisualizar) {
    $CodFuncionario = $FuncionarioVisualizar->getCodfuncionario();
    $Nome = $FuncionarioVisualizar->getNome();
    $Salario = $FuncionarioVisualizar->getSalario();
    $Telefone = $FuncionarioVisualizar->getTelefone();
    $RG = $FuncionarioVisualizar->getRG();
    $CPF = $FuncionarioVisualizar->getCPF();
    $Email = $FuncionarioVisualizar->getEmail();
    $Usuario = $FuncionarioVisualizar->getUsuario();
    $Senha = $FuncionarioVisualizar->getSenha();
  }
}

extract($_POST, EXTR_OVERWRITE);
if (isset($cadastrar)) {
  $funcionarioClass->setCodFuncionario($_POST["CodFuncionario"]);
  $funcionarioClass->setNome($_POST["Nome"]);
  $funcionarioClass->setSalario($_POST["Salario"]);
  $funcionarioClass->setTelefone($_POST["Telefone"]);
  $funcionarioClass->setRG($_POST["RG"]);
  $funcionarioClass->setCPF($_POST["CPF"]);
  $funcionarioClass->setEmail($_POST["Email"]);
  $funcionarioClass->setUsuario($_POST["Usuario"]);
  $funcionarioClass->setSenha($_POST["Senha"]);

  $funcionarioClass->create();
  header("Refresh:0");
}
// alterar 
else if (isset($alterar)) {
  $funcionarioClass->setCodFuncionario($_POST["CodFuncionario"]);
  $funcionarioClass->setNome($_POST["Nome"]);
  $funcionarioClass->setSalario($_POST["Salario"]);
  $funcionarioClass->setTelefone($_POST["Telefone"]);
  $funcionarioClass->setRG($_POST["RG"]);
  $funcionarioClass->setCPF($_POST["CPF"]);
  $funcionarioClass->setEmail($_POST["Email"]);
  $funcionarioClass->setUsuario($_POST["Usuario"]);
  $funcionarioClass->setSenha($_POST["Senha"]);

  $funcionarioClass->update();
  header("Refresh:0");

} else if (isset($excluir)) {
  $funcionarioClass->setCodFuncionario($_POST["CodFuncionario"]);
  $funcionarioClass->delete();
  header("Refresh:0");

} else if (isset($pesquisar)) {
  $NomePesquisa = $_POST["pesquisa"];
  header("Location: crud3.php?pesquisar=$NomePesquisa");

} else if (isset($limpar)) {

  header("Location: crud3.php");
}
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="icon" href="../img/gamesphere.ico" />
  <link rel="stylesheet" href="../css/crud.css" />
  <title>Funcionário</title>
</head>

<body>
  <?php
  require_once("../components/navbar.php");
  ?>

  <main class="container">
    <h1>Informações</h1>
    <form name="form-crud" method="POST" class="form-crud">
      <div class="input-grid">
        <div class="input-row">
          <div class="input-div inputdisabled">
            <label for="CodFuncionario">CodFuncionario</label>
            <input type="number" placeholder="0" name="CodFuncionario" id="CodFuncionario"
              value="<?= ($CodFuncionario != '') ? $CodFuncionario : '' ?>" tabindex="-1">
          </div>
          <div class="input-div">
            <label for="Nome">Nome</label>
            <input type="text" name="Nome" placeholder="Nome do funcionario" id="Nome"
              value="<?= ($Nome != '') ? $Nome : '' ?>" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Salario">Salário</label>
            <input type="number" name="Salario" placeholder="0" id="Salario"
              value="<?= ($Salario != '') ? $Salario : '' ?>" required>
          </div>
          <div class="input-div">
            <label for="Email">Email</label>
            <input type="text" name="Email" placeholder="email@email" id="Email"
              value="<?= ($Email != '') ? $Email : '' ?>" required>
          </div>
        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Telefone">Telefone</label>
            <input type="text" name="Telefone" id="Telefone" placeholder="00000-0000"
              value="<?= ($Telefone != '') ? $Telefone : '' ?>" required>
          </div>
          <div class="input-div">
            <label for="RG">RG</label>
            <input type="text" name="RG" placeholder="00.000.000-0" id="RG" value="<?= ($RG != '') ? $RG : '' ?>"
              required>
          </div>

        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="CPF">CPF</label>
            <input type="text" name="CPF" placeholder="000.000.000-00" id="CPF" value="<?= ($CPF != '') ? $CPF : '' ?>"
              required>
          </div>


        </div>
        <div class="input-row">
          <div class="input-div">
            <label for="Usuario">Usuario</label>
            <input type="text" name="Usuario" placeholder="Usuario do funcionario" id="Usuario"
              value="<?= ($Usuario != '') ? $Usuario : '' ?>" required>
          </div>
          <div class="input-div">
            <label for="Senha">Senha</label>
            <input type="number" name="Senha" placeholder="Senha do funcionario" id="Senha"
              value="<?= ($Senha != '') ? $Senha : '' ?>" required>
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

    <div class="crud-table-div">
      <form class="pesquisar-div" method="POST">
        <h1>Funcionarios</h1>
        <button name="pesquisar" type="submit">Pesquisar</button>
        <input placeholder="Nome do funcionario" type="text" name="pesquisa" id="pesquisa" value="<?php if (isset($_GET['pesquisar'])) {
          echo $NomePesquisa;
        } ?>" required>
      </form>
      <div class="crud-frame">
        <?php if ($funcionarios != []) { ?>
          <table class="crud-table fl-table">
            <thead>
              <tr>
                <th>CodFuncionario</th>
                <th>Nome</th>
                <th>Salário</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Usuario</th>
                <th>Senha</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($funcionarios as $funcionario): ?>
                <tr>
                  <td><?= $funcionario->getCodFuncionario() ?></td>
                  <td><?= $funcionario->getNome() ?></td>
                  <td><?= $funcionario->getSalario() ?></td>
                  <td><?= $funcionario->getEmail() ?></td>
                  <td><?= $funcionario->getTelefone() ?></td>
                  <td><?= $funcionario->getRG() ?></td>
                  <td><?= $funcionario->getCPF() ?></td>
                  <td><?= $funcionario->getUsuario() ?></td>
                  <td><?= $funcionario->getSenha() ?></td>
                  <td>
                    <form
                      action="crud3.php?visualizar=<?= $funcionario->getCodFuncionario() ?>&pesquisar=<?= $NomePesquisa ?>"
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