<?php

require_once('../../private/initialize.php');

session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:signin.php");
}

$productoras_set = getAllProductoras();
$generos_set = getAllGeneros();




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
            <li class="nav-item current">
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

          <div class="row">
            <div class="col-md-12 order-md-1">
              <h4 class="mb-3">Editar Pélicula</h4>
              <form action="nueva_pelicula.php" method="post" class="needs-validation" novalidate>
                <div class="mb-3">
                  <label for="username">Nombre</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre..." required>
                    <div class="invalid-feedback" style="width: 100%;">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">Imágen</label>
                    <input type="text" name="imagen" class="form-control" placeholder="Insertar URL de la imágen" placeholder="Ingresar URL de la imagen" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Trailer</label>
                    <input type="text" class="form-control" name="trailer" placeholder="Insertar URL del trailer" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName">Direcctor/es</label>
                    <input type="text" name="direccion" class="form-control" placeholder="Ingresar director/es" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName">Reparto</label>
                    <input type="text" class="form-control" name="reparto" placeholder="Ingresar reparto" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="duracion">Duración <small class="text-muted">(minutos)</small></label>
                    <input class="form-control" type="number" min="0" value="90" max="300" name="duracion" required>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="state">Fecha <small class="text-muted">(estreno)</small></label>
                    <input class="form-control" type="date" value=" echo <?php date('d/m/Y') ?>" name="fechaEstreno" required>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="state">Idioma</label>
                    <select class="custom-select d-block w-100" name="idioma" required>
                      <option value="" selected>Elegir...</option>
                      <?php
                      echo '<option>ESP</option>';
                      echo '<option>ING</option>';
                      ?>
                    </select>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>



                  <div class="col-md-4 mb-3">
                    <label for="state">Clasificación</label>
                    <select class="custom-select d-block w-100" name="clasificacion" required>
                      <option value="" selected>Elegir...</option>
                      <?php

                      echo '<option>AA</option>';
                      echo '<option>A</option>';
                      echo '<option>B</option>';
                      echo '<option>B</option>';
                      echo '<option>B15</option>';
                      echo '<option>C</option>';
                      ?>
                    </select>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="state">Productora</label>
                    <select class="custom-select d-block w-100" name="productora" required>
                      <option value="" selected>Elegir...</option>
                      <?php
                      echo $movie['PRODUCTORA'];

                      while ($productora = mysqli_fetch_assoc($productoras_set)) {

                        echo "<option>" . $productora['NOMBRE'] . "</option>";
                      }
                      ?>
                    </select>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="state">Género</label>
                    <select class="custom-select d-block w-100" name="genero" required>
                      <option value="" selected>Elegir...</option>
                      <?php

                      while ($genero = mysqli_fetch_assoc($generos_set)) {

                        echo "<option>" . $genero['NOMBRE'] . "</option>";
                      }
                      ?>
                    </select>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Sipnosis</h4>
                <div class="row">
                  <div class="form-group col-md-12 mb-3">
                    <textarea class="form-control" name="sipnosis" rows="3" placeholder="Escribir sipnosis..." required></textarea>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
              </form>
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

  <div class="footer-copyright text-center mt-5 p-3">UNISON © <?php echo date('Y'); ?> Copyright:
    <a href="#"> CinemaCNS</a>
  </div>


</footer>

</html>