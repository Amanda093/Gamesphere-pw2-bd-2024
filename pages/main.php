<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/geral.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <title>Página Inicial</title>
</head>

<body>
  <?php require_once("../components/navbar.php"); ?>
  <main class="container">
    <section class="main">
      <form id="formContato">
        <h1>Envie uma mensagem!</h1>
        <p>Nome</p>
        <input size="20" />
        <p>Email:</p>
        <input size="20" />
        <p>Reclamação/Comentário:</p>
        <textarea rows="5" cols="20"></textarea>
        <div class="row">
          <button name="btnEnviar" type="submit">Enviar</button>
          <button class="button-outlined" name="btnLimpar" type="reset">Limpar</button>
        </div>
      </form>

      <div id="desenvolvedores">
        <h1>Desenvolvedores</h1>
        <p>Amanda Farias da Rocha</p>
        <p>Carlos Henrique Rodrigues Barile</p>
        <p>Sakiri Moon Cestari</p>
        <img src="../img/gamesphere-vermelha.png" class="logo-dev" alt="Logo Gamesphere" />
      </div>
    </section>
  </main>
</body>

</html>