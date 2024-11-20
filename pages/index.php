<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..//css/geral.css" />
    <link rel="stylesheet" href="..//css/login.css" />
    <title>Login</title>
  </head>

  <body>
    <main>
      <section class="login">
        <h1>Login</h1>
        <form name="usuario" method="POST" action="">
          <div class="row">
            <label for="">Email</label>
            <input name="txtEmail" type="email" required />
          </div>
          <div class="row">
            <label for="">Senha</label>
            <input name="txtSenha" type="password" required />
          </div>
          <div class="row">
            <button name="btnEnviar" type="submit">Enviar</button>
            <button class="button-outlined" name="btnLimpar" type="reset">Limpar</button>
          </div>
        </form>
      </section>
    </main>
  </body>
</html>
