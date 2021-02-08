<?php

    $min = 5;
    $max = 10;

    if (isset($_POST['submit'])) {
        $name = array("Bryan", "Student", 'Alan');
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (strlen($username) < $min) {
            echo "Username has to be longer than $min";
        }

        if (strlen($username) > $max) {
            echo "Username cannot be longer than $max";
        }

        if (!in_array($username, $name)) {
            echo "Sorry, you are not allowed";
        } else {
            echo "Welcome";
        }

        // echo 'Que pex ' . $username;
        // echo '<br>';
        // echo 'Your password is ' . $password;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM PHP</title>
</head>
<body>
    <form action="form.php" method="post">
        <input type="text" name="username" placeholder="Enter Username">
        <br>
        <input type="password" name="password" placeholder="Enter Password">
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>