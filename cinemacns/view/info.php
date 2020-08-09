<?php

require_once('../private/initialize.php');
$id = $_GET['id'];

session_start();
$banderilla = 0;

if (isset($_SESSION['admin'])) {
  $banderilla = 1;
}


if (!isset($_GET['id']) || $_GET['id'] == '') {
  echo '<script type="text/javascript">
               window.location.href = "index.php";
          </script>';
} else {
  $movies_set = getMovieByID($id);
  $movie = mysqli_fetch_assoc($movies_set);
  if (empty($movie)) {
    echo '<script type="text/javascript">
    alert("No se encontró pelicula que coincida con el ID proporcionado");
     window.location.href = "index.php";
 </script>';
  }
}

$productora = mysqli_fetch_assoc(getProductoraNameByID($id));
$genero = mysqli_fetch_assoc(getGeneroNameByID($id));


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style_view_movies.css">
  <link rel="stylesheet" media="screen and (min-width: 1100px)" href="css/widescreen.css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <title>CinemaCNS | The Best Movies</title>
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="cinema.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
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

      <?php

      if ($banderilla == 1) {
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='admin/cerrar_sesion.php'>" . $_SESSION['admin'] . "  <span class='text-secondary'>
       <i class='fas fa-user-cog'></i></span> </a></li>";
      } else {
        echo "<li><a href='index.php'>Inicio</a></li>
        <li><a href='admin/signin.php'>Iniciar Sesión</a></li>";
      }
      ?>
    </ul>
  </nav>



  <main role="main" class="l-sm-auto col-lg-12 p-0 px-4">

    <div class="container p-0 emp-profile">
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <img src="<?php echo $movie['IMAGEN']; ?>" alt="" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head">
            <h3>
              <?php echo $movie['NOMBRE']; ?><small class="text-muted"> (<?php echo substr($movie['FECHA_ESTRENO'], 0, 4) ?>)</small>
            </h3>
            <h6>
              <small><strong><?php echo $productora['NOMBRE']; ?></strong></small>
            </h6>
            <p class="proile-rating">Direccion : <span><?php echo $movie['DIRECTOR']; ?></span></p>
            <p class="proile-rating">Reparto : <span><?php echo $movie['REPARTO']; ?></span></p>
            <ul class="nav m-0 nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="info.php?id=<?php echo $id; ?>" role="tab" aria-controls="home" aria-selected="true">Sipnosis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="info_trailer.php?id=<?php echo $id; ?>" role="tab" aria-controls="profile" aria-selected="false">Trailer</a>
              </li>
            </ul>
          </div>
          <div class="tab-content profile-tab mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <p style="text-align: justify;"><?php echo $movie['SIPNOSIS'] ?></p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-2 p-0">

          <?php
          if ($banderilla == 1) {
            echo "<a class='btn btn-primary btn-sm' role='button' href='admin/editar_pelicula.php?id=" . $id . "'>Administrar</a>";
          } else {
            echo "<a class='btn btn-secondary btn-sm' role='button' href='cartelera_individual.php?id=<?php echo $id; ?>'>Ver Funciones</a>";
          }
          ?>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-work">
            <p><strong>INFO</strong></p>
            <a href=""><small class="text-muted">Idioma:</small> <?php echo $movie['IDIOMA']; ?></a><br />
            <a href=""><small class="text-muted">Genero:</small> <?php echo $genero['NOMBRE']; ?></a><br />
            <a href=""><small class="text-muted">Duración:</small> <?php echo $movie['DURACION']; ?><small> (minutos)</small></a><br />
            <a href=""><small class="text-muted">Fecha de estreno:</small> <?php echo $movie['FECHA_ESTRENO']; ?></a><br />
          </div>
        </div>
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
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>






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

  <div class="footer-copyright text-white text-center mt-5 p-3">UNISON © <?php echo date('Y'); ?> Copyright:
    <strong>CinemaCNS</strong>
  </div>


</footer>


</html>