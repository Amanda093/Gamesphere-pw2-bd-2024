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
      <form id="formContato" method="POST" action="https://formsubmit.co/carloshrbarile@gmail.com">
        <input type="hidden" name="_next" value="http://localhost/gamesphere-pw2-bd-2024/pages/main.php">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_captcha" value="false">
        <h1>Envie uma mensagem!</h1>
        <p>Nome</p>
        <input required placeholder="Seu Nome..." name="name" type="text" />
        <p>Email:</p>
        <input required placeholder="Seu Email..." name="email" type="email" />
        <p>Reclamação/Comentário:</p>
        <textarea rows="5" cols="20" required placeholder="Sua Mensagem..." name="message"></textarea>
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