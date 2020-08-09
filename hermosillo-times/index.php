<?php require_once('private/initialize.php'); ?>
<?php

$news_set = findRecentNews();
$nacional_set = findNacionalRecentNews();
$espectaculos_set = findEspectaculosRecentNews();
$estatal_set = findEstatalRecentNews();
$deportes_set = findDeportesRecentNews();
$entretenimiento_set = findEntretenimientoRecentNews();
$tecnologia_set = findTecnologiaRecentNews();
$videojuegos_set = findVideoJuegosRecentNews();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato|Staatliches" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <title>NewsGrid | Latest News</title>
</head>

<body>
  <figure>
<a href="http://www.google.com"> <img src="img/banner.jpg" widht="30" height="150"></a>
</figure>
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
        <li><a class="current" href="index.php">Inicio</a></li>
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
        <li><a href="admin.php">Admin</a></li>
      </ul>
    </div>
  </nav>

  <!-- Showcase -->
  <header id="showcase">
    <div class="container">
      <div class="showcase-container">
        <div class="showcase-content">
          <?php $news = mysqli_fetch_assoc($news_set); ?>
          <div class="category category-<?php echo $news['CATEGORY']; ?>"><?php echo $news['CATEGORY']; ?></div>
          <h1><?php echo $news['TITLE']; ?></h1>
          <p><?php echo $news['HEAD_BODY']; ?></p>
          <a href="<?php echo 'news.php?id=' . $news['ID']; ?>" class="btn btn-primary">Leer más</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Home Articles -->
  <section id="home-articles" class="py-2">
    <div class="container">
      <h2>Noticias - <?php echo date('d/m/y'); ?> </h2>
      <div class="articles-container">


        <?php while ($nacional = mysqli_fetch_assoc($nacional_set)) { ?>
          <article class="card">
            <img src="<?php echo $nacional['IMAGE']; ?>" alt="">
            <div>
              <div class="category category-<?php echo $nacional['CATEGORY']; ?>"><?php echo $nacional['CATEGORY']; ?></div>
              <h3>
                <a href="news.php?id=<?php echo $nacional['ID']; ?>"><?php echo $nacional['TITLE']; ?></a>
              </h3>
              <p><?php echo $nacional['HEAD_BODY']; ?></p>
            </div>
          </article>
          
        <?php } ?>

        <?php while ($espectaculos = mysqli_fetch_assoc($espectaculos_set)) { ?>
          <article class="card bg-dark">
            <div class="category category-<?php echo $espectaculos['CATEGORY']; ?>"><?php echo $espectaculos['CATEGORY']; ?></div>
            <h3>
              <a href="news.php?id=<?php echo $espectaculos['ID']; ?>"><?php echo $espectaculos['TITLE']; ?></a>
            </h3>
            <p><?php echo $espectaculos['HEAD_BODY']; ?></p>
          </article>
        <?php } ?>

        <?php while ($estatal = mysqli_fetch_assoc($estatal_set)) { ?>
          <article class="card">
            <img src="<?php echo $estatal['IMAGE']; ?>" alt="">
            <div class="category category-<?php echo $estatal['CATEGORY']; ?>"><?php echo $estatal['CATEGORY']; ?></div>
            <h3>
              <a href="news.php?id=<?php echo $estatal['ID']; ?>"><?php echo $estatal['TITLE']; ?></a>
            </h3>
            <p><?php echo $estatal['HEAD_BODY']; ?></p>
          </article>
        <?php } ?>

        <?php while ($deportes = mysqli_fetch_assoc($deportes_set)) { ?>
          <article class="card">
            <div class="category category-<?php echo $deportes['CATEGORY']; ?>"><?php echo $deportes['CATEGORY']; ?></div>
            <h3>
              <a href="news.php?id=<?php echo $deportes['ID']; ?>"><?php echo $deportes['TITLE']; ?></a>
            </h3>
            <p><?php echo $deportes['HEAD_BODY']; ?></p>
            <img src="<?php echo $deportes['IMAGE']; ?>" alt="">
          </article>
        <?php } ?>

        <?php while ($entretenimiento = mysqli_fetch_assoc($entretenimiento_set)) { ?>
          <article class="card">
            <img src="<?php echo $entretenimiento['IMAGE']; ?>" alt="">
            <div class="category category-<?php echo $entretenimiento['CATEGORY']; ?>"><?php echo $entretenimiento['CATEGORY']; ?></div>
            <h3>
              <a href="news.php?id=<?php echo $entretenimiento['ID']; ?>"><?php echo $entretenimiento['TITLE']; ?></a>
            </h3>
            <p><?php echo $entretenimiento['HEAD_BODY']; ?></p>
          </article>

        <?php } ?>

        <?php while ($tecnologia = mysqli_fetch_assoc($tecnologia_set)) { ?>

          <article class="card bg-primary">
            <div class="category category-<?php echo $tecnologia['CATEGORY']; ?>"><?php echo $tecnologia['CATEGORY']; ?></div>
            <h3>
              <a href="news.php?id=<?php echo $tecnologia['ID']; ?>"><?php echo $tecnologia['TITLE']; ?></a>
            </h3>
            <p><?php echo $tecnologia['HEAD_BODY']; ?></p>
          </article>
        <?php } ?>

        <?php while ($videojuegos = mysqli_fetch_assoc($videojuegos_set)) { ?>

          <article class="card">
            <div>
              <div class="category category-<?php echo $videojuegos['CATEGORY']; ?>"><?php echo $videojuegos['CATEGORY']; ?></div>
              <h3>
                <a href="news.php?id=<?php echo $videojuegos['ID']; ?>"><?php echo $videojuegos['TITLE']; ?></a>
              </h3>
              <p><?php echo $videojuegos['HEAD_BODY']; ?></p>
            </div>
            <img src="<?php echo $videojuegos['IMAGE']; ?>" alt="">
          </article>
        <?php } ?>
        

      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer id="main-footer" class="py-2">
    <div class="container footer-container">
      <!-- aqui puedes poner anuncio -->
      <div>
        <p>
          Copyright &copy; 2019, All Rights Reserved
        </p>
      </div>
    </div>
  </footer>

</body>

</html>