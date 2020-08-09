<?php require_once('private/initialize.php'); ?>
<?php

$idNews = $_GET['id'];

$news_set = findNewsByID($idNews);
$news = mysqli_fetch_assoc($news_set);

if (!isset($idNews) || $idNews == '') {

    echo '<script type="text/javascript">
      window.location.href = "index.php";
  </script>';
} else if (empty($news)) {
    echo '<script type="text/javascript">
     alert("No se encontró noticia que coincida con ese ID");
      window.location.href = "index.php";
  </script>';
}
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
    <a href="http://www.google.com"> <img src="img/descarga.jpg" width="130" height="100"></a>
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
                        <a class="current">Secciones</a>
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
    <section id="article">
        <div class="container">
            <div class="page-container">
                <article class="card">
                    <img src="<?php echo $news['IMAGE']; ?>" alt="">
                    <h1 class="l-heading"><?php echo $news['TITLE']; ?></h1>
                    <div class="meta">
                        <small>
                            <i class="fas fa-user"></i> Publicado por <strong><?php echo $news['AUTHOR']; ?></strong>, él <?php echo date('d/m/y', strtotime($news['PUBLICATION_DATE'])); ?> a las <?php echo date('h:m a', strtotime($news['PUBLICATION_DATE'])); ?>
                        </small>
                        <div class="category category-<?php echo $news['CATEGORY']; ?>"><?php echo $news['CATEGORY']; ?></div>
                    </div>
                    <p><?php echo $news['BODY']; ?></p>
                </article>
                <aside class="card bg-secondary">
                    <figure>
                        <a href="http://www.google.com"><img src="img/kfc.jpg"></a>
                    </figure>
                    <figcaption>
                        <p>Publicidad :Alvaro Figueroa</p>
                    </figcaption>
                </aside>
                <aside id="categories" class="card">
                    <h1>SECCIONES</h1>
                    <ul class="list">
                        <li><a href="news_filter.php?filter=INTERNACIONAL"><i class="fas fa-chevron-right"></i> INTERNACIONAL</a></li>
                        <li><a href="news_filter.php?filter=NACIONAL"><i class="fas fa-chevron-right"></i> NACIONAL</a></li>
                        <li><a href="news_filter.php?filter=ESTATAL"><i class="fas fa-chevron-right"></i> ESTATAL</a></li>
                        <li><a href="news_filter.php?filter=DEPORTES"><i class="fas fa-chevron-right"></i> DEPORTES</a></li>
                        <li><a href="news_filter.php?filter=TECNOLOGIA"><i class="fas fa-chevron-right"></i> TECNOLOGÍA</a></li>
                        <li><a href="news_filter.php?filter=ESPECTACULOS"><i class="fas fa-chevron-right"></i> ESPECTACULOS</a></li>
                    </ul>
                </aside>

                <aside class="card bg-secondary">
                    <figure>
                        <a href="http://www.google.com"><img src="img/x.jpg"></a>
                    </figure>
                    <figcaption>
                        <p>Publicidad :Alvaro Figueroa</p>
                    </figcaption>
                </aside>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="main-footer" class="py-2">
        <div class="container footer-container">

            <div>
                <p>
                    Copyright &copy; <?php echo date('Y'); ?>, All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
</body>

</html>