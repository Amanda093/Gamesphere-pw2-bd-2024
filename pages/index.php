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
          <label for="">Usuario</label>
          <input name="txtUsuario" type="text" required />
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

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnEnviar)) {
      include_once '../classes/Funcionario.php';
      $user = new Funcionario();

      $user->setUsuario($txtUsuario);
      $user->setSenha($txtSenha);
      $func = $user->login();
      $existe = false;

      foreach ($func as $func_mostrar) {
        $existe = true; ?>

        <script type="text/javascript">
          $(document).ready(function () {
            Swal.fire({
              title: "Seja bem-vindo!!!",
              confirmButtonColor: "#ff4a57",
              color: "#201b2c",

              imageUrl: "../img/roxo.gif",
              imageWidth: 200,
              imageAlt: "Locadora",

              background: "#100d16",
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'main.php'; // Redireciona ao clicar no botão de confirmação
              }
            });
          });
        </script>
        <?php
      }
      if ($existe == false) {

      }
    }
    ?>

  </main>
</body>

</html>