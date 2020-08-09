<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}

$id = trim(htmlentities(addslashes($_GET['id'])));

if (!isset($id) || $id == '') {
  echo '<script type="text/javascript">
               window.location.href = "generos.php";
          </script>';
} else {
  $genero_set = searchGeneroByID($id);

  if (empty($genero_set)) {
    echo '<script type="text/javascript">
    alert("No se encontró pelicula que coincida con el ID proporcionado");
     window.location.href = "funciones.php";
 </script>';
  }
}

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
            <li class="nav-item">
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
            <li class="nav-item current">
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
          <h1 class="h2">Editar Género</h1>
          <!-- <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-outline-secondary">Editar</button>
      <button class="btn btn-sm btn-outline-secondary">Eliminar</button>
    </div>
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
      <span data-feather="calendar"></span>
      This week
    </button>
  </div> -->
        </div>

        <form action="guardar_genero.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" name="campo_genero" placeholder="Agregar Género">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary botonBuscar btn-sm" name="agregar">Agregar</button>
            </div>
          </div>
        </form>

        <form action="buscar_genero.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-sm" name="buscar" placeholder="Buscar Género">
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
                <th>&nbsp;</th>

              </tr>
            </thead>
            <tbody>
              <?php

              while ($genero = mysqli_fetch_assoc($genero_set)) {
                if (empty($genero)) {
                  echo '<h3>No hay Generos agreados aun aún</h3>';
                } else {

                  echo "<tr><form action='editar_gen.php' method='POST'><td>
                  <input type='hidden' name='id' value='" . $genero['ID'] . "'>
                  <input type='text' class='form-control' name='campo_genero' value='" . $genero['NOMBRE'] . "'>
                  </td>";
                  echo  "<td style='color:#fff'; width=5%><button type='submit' style='color: #fff;' class='btn btn-primary'>Guardar</button></td></form>";
                  echo "</form></tr>";
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