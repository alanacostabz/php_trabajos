<?php

require_once('../../private/initialize.php');

$email = trim(htmlentities(addslashes($_POST['inputEmail'])));
$inputPassword = (htmlentities((addslashes($_POST['inputPassword']))));

$result = login($email, $inputPassword);

$rows = mysqli_num_rows($result);

if ($rows > 0) {
  session_start();
  $_SESSION['admin'] = $email;
  header('Location:peliculas.php');
} else {
  echo '<script type="text/javascript">
  alert("El correo y/o contraseña no son válidos.");
   window.location.href = "signin.php";
</script>';
}
