<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNCTIONS</title>
</head>
<body>
    <?php
        function init() {

            calculate();
            say_something();
        }

        function calculate() {
            echo 5 + 5;
        }

        function say_something() {
            
            echo '<br>Que pex morro<br>';

        }

        init();
    ?>
</body>
</html>