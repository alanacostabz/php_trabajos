<?php include "functions.php"; ?>
<?php include "includes/header.php"; ?>

<section class="content">

	<aside class="col-xs-4">

		<?php Navigation(); ?>


	</aside>
	<!--SIDEBAR-->


	<article class="main-content col-xs-8">


		<?php



		/* Step 1: Make 2 variables called number1 and number2 and set 1 to value 10 and the other 20:

		  Step 2: Add the two variables and display the sum with echo:


		  Step3: Make 2 Arrays with the same values, one regular and the other associative

		 
			 */

		#step 1
		$number1 = 10;
		$number2 = 20;

		#step 2
		echo $number1 + $number2 . "<br>";

		#step3
		$array1 = array("Playstation 5", "Nintendo Switch");
		$array2 = array("Sony" => "Playstation 5", "Nintendo" => "Nintendo Switch");

		print_r($array1);
		echo "<br>";
		echo $array1[0] . "<br>";
		print_r($array2);
		echo "<br>";
		echo $array2['Nintendo'] . "<br>";

		?>



	</article>
	<!--MAIN CONTENT-->

	<?php include "includes/footer.php"; ?>