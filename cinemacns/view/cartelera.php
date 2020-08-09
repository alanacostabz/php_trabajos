<?php require_once('../private/initialize.php'); ?>
<?php


$banderilla = 0;
session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
} else {
  $banderilla = 1;
}

$movies_set = getFunctions();

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
        echo "<li><a href='cerrar_sesion.php'>" . $_SESSION['admin'] . "  <span class='text-secondary'>
 <i class='fas fa-user-cog'></i></span> </a></li>";
      } else {
        echo "<li><a href='index.php'>Inicio</a></li>
  <li><a href='admin/signin.php'>Iniciar Sesión</a></li>";
      }
      ?>
    </ul>
  </nav>




  <div class="container-fluid">
    <div class="row">

      <main role="main" class="ml-sm-auto col-lg-12 p-0 px-4">

        <div class="container p-4 emp-profile">

          <?php


          $banderilla = 0;



          while ($movies = mysqli_fetch_assoc($movies_set)) {
            $banderilla = 1;
            echo ' <div class="card mb-3 m-auto py-0" style="max-width: 540px;">
<div class="row no-gutters">
<div class="col-md-4">
  <img class="bd-placeholder-img" width="100%" height="250" src="' . $movies['IMAGEN'] . '">
  <title><?php echo $pelicula; ?></title>
  </svg>
</div><div class="col-md-8">
<div class="card-body">
<h5 class="card-title">' . $movies['NOMBRE'] . '</h5>
<hr class="mb-4">
<p class="card-text"><strong>Función: </strong>' . $movies['FECHA_FUNCION'] . '</p>
<p class="card-text">
  <a class="btn btn-sm bg-primary mr-2"><strong>' . $movies['CLASIFICACION'] . '</strong></a>
  <a class="btn btn-sm bg-warning"><strong>' . substr($movies['DURACION'], 0, 5) . ' min</strong></a>
  <a class="btn btn-sm bg-light"><strong>' . substr($movies['HORA_INICIO'], 0, 5) . '</strong></a>
  <a class="btn btn-sm bg-success mr-2" href="info?id=' . $movies['PELICULA'] . '"><strong>Info</strong></strong></a>
</p>
<a class="card-text" href="index.php"><small class="text-muted">&#8592; Regresar a la pagina principal</small></a>
</div>
</div>
</div>     
</div>
';
          }

          if ($banderilla == 0) {
            echo '<h3>No hay funciones disponibles actualmente</h3>';
          }

          ?>



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








  <?php require_once('../private/footer.php'); ?>