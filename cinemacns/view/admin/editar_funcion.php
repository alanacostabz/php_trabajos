<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}

$id = $_GET['id'];


if (!isset($id) || $id == '') {
  echo '<script type="text/javascript">
               window.location.href = "peliculas.php";
          </script>';
} else {
  $funciones_set = searchFunctionByID($id);
  if (empty($funciones_set)) {
    echo '<script type="text/javascript">
    alert("No se encontró pelicula que coincida con el ID proporcionado");
     window.location.href = "peliculas.php";
 </script>';
  } else {
    $funcion  = mysqli_fetch_assoc($funciones_set);
    $movieID = searchMovieByID($funcion['PELICULA']);
    $movieInfo = mysqli_fetch_assoc($movieID);
    $movies_set = getAllMovies();
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

        <div class="container">

          <h4 class="mb-3">Agregar Funciones</h4>
          <form action="guardar_funcion.php?id=<?php echo $funcion['ID']; ?>" method="post" class="needs-validation" novalidate>

            <div class="row">



              <div class="col-md-6 mb-3">
                <label for="state">Pélicula</label>
                <select class="custom-select d-block w-100" name="pelicula" required>
                  <option value="">Elegir...</option>
                  <?php

                  while ($movie = mysqli_fetch_assoc($movies_set)) {

                    if ($funcion['PELICULA'] == $movie['ID']) {
                      echo "<option selected>" . $movie['NOMBRE'] . "</option>";
                    } else {
                      echo "<option>" . $movie['NOMBRE'] . "</option>";
                    }
                  }


                  ?>
                </select>
                <div class="invalid-feedback">
                  Debe completar este campo.
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="state">Sala</label>
                <select class="custom-select d-block w-100" name="sala" required>
                  <option value="">Elegir...</option>
                  <?php
                  if ($funcion['SALA'] == '1A') {
                    echo '<option selected >1A</option>';
                  } else {
                    echo '<option>1A</option>';
                  }
                  if ($funcion['SALA'] == '2A') {
                    echo '<option selected >2A</option>';
                  } else {
                    echo '<option>2A</option>';
                  }
                  if ($funcion['SALA'] == '3A') {
                    echo '<option selected >3A</option>';
                  } else {
                    echo '<option>3A</option>';
                  }
                  if ($funcion['SALA'] == '4A') {
                    echo '<option selected >4A</option>';
                  } else {
                    echo '<option>4A</option>';
                  }
                  if ($funcion['SALA'] == '5A') {
                    echo '<option selected >5A</option>';
                  } else {
                    echo '<option>5A</option>';
                  }
                  if ($funcion['SALA'] == '6A') {
                    echo '<option selected >6A</option>';
                  } else {
                    echo '<option>6A</option>';
                  }
                  ?>

                </select>
                <div class="invalid-feedback">
                  Debe completar este campo.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="state">Fecha <small class="text-muted">(función)</small></label>
                <input class="form-control" type="date" value="<?php echo $funcion['FECHA_FUNCION']; ?>" name="fechaFuncion" required>
                <div class="invalid-feedback">
                  Debe completar este campo.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="state">Hora <small class="text-muted">(función)</small></label>
                <?php date_default_timezone_set('America/Los_Angeles'); ?>
                <input class="form-control" type="time" value="<?php echo $funcion['HORA_INICIO'] ?>" name="horaFuncion" required>
                <div class="invalid-feedback">
                  Debe completar este campo.
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <label for="state">Subtitulos</label>
                <select class="custom-select d-block w-100" name="subtitulos" required>
                  <?php
                  if ($funcion['SUBTITULOS'] == 'NO') {
                    echo '<option selected >NO</option>';
                  } else {
                    echo '<option>NO</option>';
                  }
                  if ($funcion['SUBTITULOS'] == 'ESP') {
                    echo '<option selected >ESP</option>';
                  } else {
                    echo '<option>ESP</option>';
                  }
                  if ($funcion['SUBTITULOS'] == 'ING') {
                    echo '<option selected >ING</option>';
                  } else {
                    echo '<option>ING</option>';
                  }
                  ?>
                </select>
                <div class="invalid-feedback">
                  Debe completar este campo.
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar</button>
          </form>
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
<footer class="page-footer font-small bg-dark flex-md-nowrap p-0">

  <div class="footer-copyright text-center mt-5 p-3">UNISON © <?php echo date('Y'); ?> Copyright:
    <a href="#"> CinemaCNS</a>
  </div>


</footer>

</html>