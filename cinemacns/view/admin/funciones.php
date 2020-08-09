<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}

$funciones_set = getAllFunctions();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" media="screen and (min-width: 1100px)" href="css/widescreen.css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <title>CinemaCNS | The Best Movies</title>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">


  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">


  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="../../css/dashboard.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body id="home">
  <!-- Navbar -->
  <nav id="navbar">
    <h1 class="logo">
      <span class="text-primary">
        <i class="fas fa-film"></i> Cinema</span>CNS
    </h1>
    <ul>
      <li><a href="cerrar_sesion.php"><?php echo $_SESSION['admin']; ?> <span class="text-secondary">
            <i class="fas fa-user-cog"></i></span> </a></li>
    </ul>
  </nav>





  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 p-0 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="../index.php">
                <span class="text-primary">
                  <i class="fas fa-home"></i></span>
                Inicio
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="peliculas.php">
                <span class="text-primary">
                  <i class="fas fa-film"></i></span>
                Péliculas
              </a>
            </li>
            <li class="nav-item current">
              <a class="nav-link" href="funciones.php">
                <span class="text-primary">
                  <i class="fas fa-film"></i></span>
                Funciones
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrar</span>
            <a class="d-flex align-items-center text-muted" href="#">
              <span class="text-primary">
                <i class="fas fa-plus-circle"></i></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="generos.php">
                <span class="text-primary">
                  <i class="far fa-sticky-note"></i></span>
                Géneros
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="productoras.php">
                <span class="text-primary">
                  <i class="far fa-sticky-note"></i></span>
                Productoras
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">FUNCIONES</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mb-3">
              <a role="button" class="btn btn-primary botonBuscar btn-sm" href="formulario_funcion.php">
                <span data-feather="plus-circle"></span> Añadir Función</a>
            </div>
          </div>
        </div>

        <form action="buscar_funciones.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" name="buscar" placeholder="Buscar funcion por pélicula...">
            <div class="input-group-append">
              <button type="submit" class="btn btn-success btn-sm" name="Buscar">Buscar</button>
            </div>
          </div>

        </form>

        <h2>Registros</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Sala</th>
                <th>Subtitulos</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>

              </tr>
            </thead>
            <tbody>
              <?php

              while ($funcion  = mysqli_fetch_assoc($funciones_set)) {

                if (empty($funcion)) {
                  echo '<h3>No hay Generos agreados aun aún</h3>';
                } else {

                  echo "<tr>";
                  echo "<td>" . $funcion['NOMBRE'] . "</td>";
                  echo "<td>" . $funcion['FECHA_FUNCION'] . "</td>";
                  echo "<td>" . $funcion['HORA_INICIO'] . "</td>";
                  echo "<td>" . $funcion['SALA'] . "</td>";
                  echo "<td>" . $funcion['SUBTITULOS'] . "</td>";

                  echo  "<td style='color:#fff'; width=5%><a class='btn btn-sm btn-warning' role='button' href='editar_funcion.php?id=" . $funcion['ID_F'] . "'>Editar</a></td>";
                  echo  "<td style='color:#fff'; width=5%><a class='btn btn-sm btn-danger' role='button' href='eliminar_funciones.php?id=" . $funcion['ID_F'] . "'>Borrar</a></td>";
                  echo "</tr>";
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../assets/js/vendor/popper.min.js"></script>
  <script src="../../dist/js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>


</body>
<!-- Footer -->

<?php require_once('../../private/footer.php'); ?>


</html>