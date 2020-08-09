<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Handle form values sent by new.php

  $page = [];
  $page['name_subject'] = $_POST['name_subject'] ?? '';
  $page['menu_name'] = $_POST['menu_name'] ?? '';
  $page['position'] = $_POST['position'] ?? '';
  $page['visible'] = $_POST['visible'] ?? '';
  $page['content'] = $_POST['content'] ?? '';


  if (has_unique_page_menu_name($page['menu_name'], 'pages')) {
    //redirect_to(url_for('/staff/pages/new.php'));

    echo '<script type="text/javascript">
          alert("El nombre de la página ya existe");
          window.location.href="new.php";
          </script>';
  } else {

    $result = insert_page($page);
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for("/staff/pages/show.php?id=" . $new_id));
  };
} else {
  redirect_to(url_for('/staff/pages/new.php'));
}
