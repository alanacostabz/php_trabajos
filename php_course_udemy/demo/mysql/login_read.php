<?php
	include_once 'db.php';	
	include_once 'functions.php';	
?>



<?php include "includes/header.php"; ?>
    <div class="container">
			<div class="col-sm-6">
				<pre>
					<?php ReadRows(); ?>
				</pre>
			</div>
<?php include "includes/footer.php"; ?>
