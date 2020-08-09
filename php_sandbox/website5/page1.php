<?php
if (isset($_POST['submit'])) {
  $username = htmlentities($_POST['username']);

  setcookie('username', $username, time() + 3600); // 1 hour

  header('Location: page2.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Cookies</title>
</head>

<body>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="username" placeholder="Enter username">
    <br>
    <input type="submit" value="Submit" name="submit">
  </form>
</body>

</html>