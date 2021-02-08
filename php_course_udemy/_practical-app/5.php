<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php 


/*  Step 1: Use a pre-built math function here and echo it

	Step 2:  Use a pre-built string function here and echo it

	Step 3:  Use a pre-built Array function here and echo it

*/

	# STEP 1
	$random = rand(1,10);
	echo $random;
	echo '<br>';

	# STEP 2
	$consola = 'PLAYSTATION 5';
	echo strlen($consola);
	echo '<br>';

	# STEP 3
	$precios = [30,20,70];
	echo max($precios);
	echo '<br>';

	$juegos = ['Resident evil 3', 'NIER AUTOMATA', 'DARK SOULS 2'];
	$encontrado = in_array('DARK SOULS 2', $juegos);

	if ($encontrado) {
		echo "DARK SOULS 2 DISPONIBLE";
	} else {
		echo "DARK SOULS 2 NO DISPONIBLE";
	}

	
?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>