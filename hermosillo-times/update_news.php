<?php

require_once('private/initialize.php');

$news = [];
$news['TITLE'] = $_POST['TITLE'] ?? '';
$news['ID'] = $_POST['ID'] ?? '';
$news['CATEGORY'] = $_POST['CATEGORY'] ?? '';
$news['HEAD_BODY'] = $_POST['HEAD_BODY'] ?? '';
$news['BODY'] = $_POST['BODY'] ?? '';
$news['IMAGE'] = $_POST['IMAGE'] ?? '';
$news['AUTHOR'] = $_POST['AUTHOR'] ?? '';

// if (has_unique_news_title_name($news['TITLE'])) {
//   //redirect_to(url_for('/staff/newss/new.php'));

//   echo '<script type="text/javascript">
//           alert("El título de la noticia ya existe.");
//           window.location.href="new.php";
//           </script>';
// } else {

$result = update_news($news);
echo '<script type="text/javascript">
    alert("Noticia guardada con éxito.");
    window.location.href="admin.php?filter=' . $news['CATEGORY'] . '"</script>';
// };
