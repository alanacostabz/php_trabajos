<?php

require_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Never use md5 to store passwords
    $password = md5($_POST['password']);

    // validate
    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Databases with Platzi</title>
</head>

<body>
    <div class="container">
        <h1>Add User</h1>
        <a href="index.php">Home</a>
        <?php
        if ($result) {
            echo '<div class="alert alert-success">Success</div>';
        }
        ?>
        <form action="add.php" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>