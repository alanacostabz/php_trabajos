<?php

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // if ($username && $password) {
        //     echo $username;
        //     echo $password;
        // } else {
        //     echo 'This field cannot be blank';
        // }

        # connection to the database
        $connection = mysqli_connect('localhost', 'root', '', 'loginapp');

        if ($connection) {
            echo 'We are connected';
        } else {
            die('Database connection failed');
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>LOIGN APP</title>
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <form action="login.php" method="post">

                <div class="form-group">
                <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password" name="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Submit">

            </form>
        </div>
    </div>
</body>
</html>