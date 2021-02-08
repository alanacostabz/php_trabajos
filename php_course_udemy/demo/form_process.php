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

