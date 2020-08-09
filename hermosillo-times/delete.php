<?php require_once('private/initialize.php'); ?>
<?php

$id = $_GET['id'];

if (!isset($id) || $id == '') {

  echo '<script type="text/javascript">
    window.location.href = "admin.php";
</script>';
}



$news_set = findNewsByID($id);
$news = mysqli_fetch_assoc($news_set);

if (empty($news)) {
  echo '<script type="text/javascript">
    alert("El id proporcionado no se encuentra en la base de datos.");
    window.location.href = "admin.php";
</script>';
} else {
  deleteNews($id);
  echo '<script type="text/javascript">
    alert("El la noticia ha sido eliminada con éxito.");
    window.location.href="admin.php?filter=' . $news['CATEGORY'] . '"
</script>';
}

?>

