<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Handle form values sent by new.php

  $subject = [];
  $subject['menu_name'] = $_POST['menu_name'] ?? '';
  $subject['position'] = $_POST['position'] ?? '';
  $subject['visible'] = $_POST['visible'] ?? '';

  if (has_unique_page_menu_name($subject['menu_name'], 'subjects')) {
    //redirect_to(url_for('/staff/pages/new.php'));

    echo '<script type="text/javascript">
          alert("El nombre de la materia ya existe");
          window.location.href="new.php";
          </script>';
  } else {
    $result = insert_subject($subject);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/subjects/show.php?id=" . $new_id));
  }
} else {
  redirect_to(url_for('/staff/subjects/new.php'));
}
