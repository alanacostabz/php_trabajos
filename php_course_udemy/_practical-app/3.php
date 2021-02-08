<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */

echo 'STEP #1<br>';
$favoriteLanguage = 'PHP';

if ($favoriteLanguage == 'JAVASCRIPT') {
	echo 'I love Javascript';
} elseif ($favoriteLanguage == 'C#') {
	echo 'I love C#';
} else {
	echo 'I love PHP';
}


echo '<hr><br>STEP #2<br>';

 # STEP 2
 for ($i=0; $i < 10 ; $i++) { 
	 echo "$i <br>";
 }

 echo '<hr><br>STEP #3<br>';

 # STEP 3
 $rating = 60;
 switch ($rating) {
	 case 100:
		 echo 'Perfect game';
		 break;
	 case 90:
		 echo 'Excellent game';
		 break;
	 case 80:
		 echo 'Very good game';
		 break;
	 case 70:
		 echo 'good game';
		 break;
	 case 60:
		 echo 'OK game';
		 break;
	 default:
		 echo 'I don\'t recommend that game';
		 break;
 }

	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>