<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RETURN VALUES PHP</title>
</head>
<body>
    <?php
        function addNumbers($number1, $number2) {
            $sum = $number1 + $number2;

            return $sum;
        }

        $result = addNumbers(5,5);
        $result = addNumbers(90, $result);
        echo $result;
    ?>
</body>
</html>