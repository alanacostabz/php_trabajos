<?php
include "db.php";

function CreateRows() {
	if (isset($_POST['submit'])) {
		global $connection;
		$username = $_POST['username'];
		$password = $_POST['password'];

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$hashFormat = "$2y$10$";
		$salt = "iusesomecrazystrings22";

		$hashF_and_salt = $hashFormat . $salt;

		$password = crypt($password, $hashF_and_salt);

		// if ($username && $password) {
		//     echo $username;
		//     echo $password;
		// } else {
		//     echo 'This field cannot be blank';
		// }

		# connection to the database
		// $connection = mysqli_connect('localhost', 'root', '', 'loginapp');

		//if ($connection) {
		//   echo 'We are connected';
		// } else {
		//    die('Database connection failed');
		// }

		$query = "INSERT INTO users(username, password) ";
		$query .= "VALUES ('$username','$password')";

		$result = mysqli_query($connection, $query);

		if (!$result) {
			die('Query Failed! ' . mysqli_error());
		} else {
			echo 'Record created!';
		}
	}
}

function ReadRows() {
	global $connection;
	$query = "SELECT * FROM users";

	$result = mysqli_query($connection, $query);

	if (!$result) {
		die('Query Failed! ' . mysqli_error());
	}

	// while ($row = mysqli_fetch_row($result)) {
	//     //print_r($row);
	//     var_dump($row);
	// }

	while ($row = mysqli_fetch_assoc($result)) {

		//print_r($row);

		//var_dump($row);
		print_r($row);

	}
}

function showAllData() {
	global $connection;
	$query = "SELECT * FROM users";

	$result = mysqli_query($connection, $query);

	if (!$result) {
		die('Query Failed! ' . mysqli_error());
	}

	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		echo "<option value='$id'>$id</option>";
	}
}

function UpdateTable() {
	if (isset($_POST['submit'])) {
		global $connection;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id = $_POST['id'];

		$query = "UPDATE users SET ";
		$query .= "username =  '$username', ";
		$query .= "password =  '$password' ";
		$query .= "WHERE id =  $id ";

		$result = mysqli_query($connection, $query);

		if (!$result) {
			die('Query Failed! ' . mysqli_error());
		} else {
			echo 'Record updated!';
		}
	}
}

function DeleteRow() {

	if (isset($_POST['submit'])) {
		global $connection;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$id = $_POST['id'];

		$query = "DELETE FROM users ";
		$query .= "WHERE id =  $id ";

		$result = mysqli_query($connection, $query);

		if (!$result) {
			die('Query Failed! ' . mysqli_error());
		} else {
			echo 'Record deleted!';
		}
	}
}

?>