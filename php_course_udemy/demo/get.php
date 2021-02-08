<?php
  print_r($_GET);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET</title>
</head>
<body>

  <?php 
    $id = 10;
    $button = "CLICK HERE";
  ?>
  <a href="get.php?id=<?php echo $id; ?>"><?php echo $button; ?></a>
  
</body>
</html>