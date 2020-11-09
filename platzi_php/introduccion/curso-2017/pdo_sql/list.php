<?php
require_once 'config.php';

$queryResult = $pdo->query("SELECT * FROM users");

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
        <h1>List Users</h1>
        <a href="index.php">Home</a>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td><a href="update.php?id=' . $row['id'] . '">Edit</a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>

</html>