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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><a href="admin.php" class="adminTitle">Noticias</a></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mt-3 mb-3">
              <a role="button" class="btn btn-primary btnNew" href="new.php">
                <span data-feather="plus-circle"></span> <strong>+</strong> Añadir Noticias</a>
            </div>
          </div>
        </div>

        <form action="admin.php" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-md" name="filter" placeholder="Buscar Sección">
          </div>
        </form>



        <h2>Registros</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Título</th>
                <th>Sección</th>
                <th>Publicación (Fecha)</th>
                <th>Publicador por</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>

              <?php while ($result = mysqli_fetch_assoc($news_set)) {  ?>


                <tr>
                  <td><?php echo $result['TITLE']; ?></td>
                  <td><?php echo $result['CATEGORY']; ?></td>
                  <td><?php echo $result['PUBLICATION_DATE']; ?></td>
                  <td><?php echo $result['AUTHOR']; ?></td>
                  <td><a role="button" class="action btn-sm btn-sm btn-success" href="<?php echo 'news.php?id=' . $result['ID']; ?>">Ver</a></td>
                  <td><a role="button" class="action btn-sm btn-warning" href="<?php echo 'edit.php?id=' . $result['ID']; ?>">Editar</a></td>
                  <td><a role="button" class="action btn-sm btn-danger" href="<?php echo 'delete.php?id=' . $result['ID']; ?>">Eliminar</a></td>
                </tr>

              <?php } ?>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
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