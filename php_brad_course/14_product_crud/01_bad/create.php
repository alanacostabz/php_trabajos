<?php

  /** @var $pdo \PDO */
  $pdo = require_once "database.php";
  // Superglobals — Superglobals son variables internas que están disponibles siempre en todos los ámbitos

  $errors = [];

  $title = '';
  $price = '';
  $description = '';

  // echo $_SERVER['REQUEST_METHOD'] . '<br>';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    if (!$title) {
      $errors[] = 'Product title is required';
    }

    if (!$price) {
      $errors[] = 'Product price is required';
    }

    // check if exists image folder
    if (!is_dir('images')) {
      // if no exists, create it
      mkdir('images');
    }

    if (empty($errors)) {
      $image = $_FILES["image"] ?? null;
      $imagePath = '';

      if ($image && $image['tmp_name']) {

        $imagePath = 'images/' . randomString(8) . '/' . $image['name'];
        mkdir(dirname($imagePath));

        move_uploaded_file($image['tmp_name'], $imagePath);
      }

      // exit;

      $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date) VALUES (:title, :image, :description, :price, :date)");

      $statement->bindValue(':title', $title);
      $statement->bindValue(':image', $imagePath);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':date', $date);
      $statement->execute();
      header('Location: index.php');
    }
  }

  function randomString($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i=0; $i < $n; $i++) { 
      $index = rand(0, strlen($characters) - 1);
      $str .= $characters[$index];
    }

    return $str;
  }
?>

<?php include_once "views/partials/header.php"; ?>

    <h1>Create New Product</h1>

    <?php include_once "views/products/form.php" ?>
  </body>
</html>