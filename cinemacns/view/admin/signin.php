<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Iniciar Sesión | CinemaCNS</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="../../css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <form class="form-signin" action="validar_login.php" method="POST">
    <img class="mb-4" src="http://www.dcs-me.com.lb/wp-content/uploads/2015/02/CNS-embleme-logo-S.png" alt="" width="202" height="152">
    <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Ingresar email" required autofocus>
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Ingresar contraseña" required>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <br>
    <a class="mt-5 mb-3 text-muted" href="../index.php">Regresar a la página</a>
  </form>
</body>

</html>