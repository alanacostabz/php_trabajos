<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin
			CREATE DATABASE games;
			USE games;
		

		Step 2 - Create a table like the one from the lecture
			CREATE TABLE videgames (
				id int not null AUTO_INCREMENT,
				name varchar(50) not null,
				console varchar(50) not null,
				PRIMARY KEY (id)
			);

		Step 3 - Insert some Data
			INSERT INTO videgames (name, console) VALUES ('HALO INFINITE', 'XBOX SERIES X'), ('ZELDA BOTW', 'NINTENDO SWITCH');

		Step 4 - Connect to Database and read data

*/

		$connection = mysqli_connect('localhost', 'root', '', 'games');

    if (!$connection) {
        die('Database connection failed') . mysqli_error('$connection');
		} 
		
		$query = "SELECT * FROM videgames";

		$result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed! ' . mysqli_error());
    } else {
			echo 'Games List <br>';
		}

		while ($row = mysqli_fetch_assoc($result)) {

			//print_r($row);
			echo $row['name'] . ' para ' . $row['console'] . '<br>';

    }

	
	?>





</article><!--MAIN CONTENT-->

<?php include "includes/footer.php"; ?>
