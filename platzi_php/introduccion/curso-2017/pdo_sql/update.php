<?php
include_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];

    $sql = "UPDATE users SET name =:name, email =:email WHERE id =:id";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'id' => $id,
        'name' => $newName,
        'email' => $newEmail
    ]);

    $nameValue = $newName;
    $emailValue = $newEmail;
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);

    $query->execute(([
        'id' => $id
    ]));

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nameValue = $row['name'];
    $emailValue = $row['email'];
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
        <h1>Update User</h1>
        <a href="list.php">Back</a>
        <?php
        if ($result) {
            echo '<div class="alert alert-success">Success</div>';
        }
        ?>
        <form action="update.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $nameValue; ?>">
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $emailValue; ?>">
            <br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>