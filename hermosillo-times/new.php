<?php require_once('private/initialize.php'); ?>
<?php

$filter = $_GET['filter'] ?? '';

if ($filter == '') {
  $news_set = findAllNews();
} else {
  $news_set = findSpecificSectionNews($filter);
}
$banderilla = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <title>NewsGrid | Latest News</title>
</head>

<body>
  <nav id="main-nav">
    <div class="container">
      <img src="img/logo.png" alt="NewsGrid" class="logo">
      <div class="social">
        <a href="http://facebook.com" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
        <a href="http://twitter.com" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
        <a href="http://instagram.com" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="http://youtube.com" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
      </div>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li>
          <div class="dropdown">
            <a>Secciones</a>
            <div class="dropdown-content">
              <a href="news_filter.php?filter=INTERNACIONAL">Internacional</a>
              <a href="news_filter.php?filter=NACIONAL">Nacional</a>
              <a href="news_filter.php?filter=ESTATAL">Estatal</a>
              <a href="news_filter.php?filter=DEPORTES">Deportes</a>
              <a href="news_filter.php?filter=VIDEOJUEGOS">Videojuegos</a>
              <a href="news_filter.php?filter=ESPECTACULOS">Espectaculos</a>
              <a href="news_filter.php?filter=DEPORTES">Tecnología</a>
            </div>
          </div>
        </li>
        <li><a class="current" href="admin.php">Admin</a></li>
      </ul>
    </div>
  </nav>

  <section id="about">
    <div class="container">

      <main role="main" class="ml-sm-autopt-3">

        <div class="container">

          <div class="row">
            <div class="col-md-12 order-md-1">
              <h4 class="mb-3 mt-3" style="text-align: center;">Agregar Noticia</h4>
              <form action="create_news.php" method="post" class="needs-validation" novalidate>
                <div class="mb-3">
                  <label for="username">Título</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="TITLE" placeholder="Escribir título" required>
                    <div class="invalid-feedback" style="width: 100%;">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="firstName">Encabezado</label>
                    <input type="text" name="HEAD_BODY" class="form-control" placeholder="Escribir encabezado" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="firstName">Imágen</label>
                    <input type="text" name="IMAGE" class="form-control" placeholder="Escribir URL de la imágen" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="lastName">Autor</label>
                    <input type="text" class="form-control" name="AUTHOR" placeholder="Escribir nombre del autor" required>
                    <div class="invalid-feedback">
                      Este campo no debe estar vacío.
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">Sección</label>
                    <select class="custom-select d-block w-100" name="CATEGORY" required>
                      <option value="">Elegir...</option>
                      <option>INTERNACIONAL</option>
                      <option>NACIONAL</option>
                      <option>ESTATAL</option>
                      <option>DEPORTES</option>
                      <option>ESPECTACULOS</option>
                      <option>VIDEOJUEGOS</option>
                      <option>TECNOLOGIA</option>
                    </select>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>

                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Cuerpo de la nota</h4>
                <div class="row">
                  <div class="form-group col-md-12 mb-3">
                    <textarea class="form-control" name="BODY" rows="10" placeholder="Escribir nota..." required></textarea>
                    <div class="invalid-feedback">
                      Debe completar este campo.
                    </div>
                  </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Agregar Nota</button>
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
  </section>

  <!-- Footer -->
  <footer id="main-footer" class="py-2">
    <div class="container footer-container">
      <div>
        <p>
          Copyright &copy; 2019, All Rights Reserved
        </p>
      </div>
    </div>
  </footer>
</body>

</html>