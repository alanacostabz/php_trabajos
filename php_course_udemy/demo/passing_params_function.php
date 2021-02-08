<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PASSING PARAMS FUNCTIONS</title>
</head>
<body>
    <?php
        // function addNumbers($number1, $number2) {
        //     $sum = $number1 + $number2;

        //     echo $sum;
        // }

        //  n params
        function addNumbers(...$numbers) {
            $sum = 0;
            foreach ($numbers as $number) {
                $sum+=$number;
            }      
            echo $sum;
        }

        addNumbers(5,5);
    ?>
</body>
</html>