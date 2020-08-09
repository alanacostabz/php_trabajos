<?php require_once('../private/initialize.php'); ?>
<?php

$banderilla = 0;
session_start();

if (isset($_SESSION['admin'])) {
  $banderilla = 1;
}
$movies_set = getLastMovies();

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
  <link href="../css/mobile.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body id="home">
  <!-- Navbar -->
  <nav id="navbar">
    <h1 class="logo" id="el-logo">
      <span class="text-primary">
        <i class="fas fa-film"></i> Cinema</span>CNS
    </h1>
    <ul>
      <?php
      if ($banderilla == 1) {
        echo "<li><a href='index.php'>Inicio</a></li>";
        echo "<li><a href='admin/peliculas.php'>Admin</a></li>";
        echo "<li><a href='admin/cerrar_sesion.php'>" . $_SESSION['admin'] . "  <span class='text-secondary'>
       <i class='fas fa-user-cog'></i></span> </a></li>";
      } else {
        echo "<li><a href='index.php'>Inicio</a></li>
        <li><a href='admin/signin.php'>Iniciar Sesión</a></li>";
      }
      ?>
    </ul>
  </nav>

  <main role="main">

    <section class="jumbotron text-center section-main">
      <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../private/images/1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../private/images/2.jpg" class="d-block w-100" alt="...">
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">

          <?php while ($movies = mysqli_fetch_assoc($movies_set)) { ?>
            <?php echo '<div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="' . $movies['IMAGEN'] . '" alt="Card image cap">
              <div class="card-body">
                <p class="card-title"><strong>' . $movies['NOMBRE'] . '</strong></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="info?id=' . $movies['ID'] . '">Sipnosis</a>
                    <a type="button" class="btn btn-sm btn-outline-secondary" href="cartelera.php">Cartelera</a>
                  </div>
                  <small class="text-muted">Estreno: <strong>' . $movies['FECHA_ESTRENO'] . '</strong></small>
                </div>
              </div>
            </div>
          </div>' ?>
          <?php }; ?>

        </div>
      </div>
    </div>

  </main>

  <?php require_once('../private/footer.php'); ?>