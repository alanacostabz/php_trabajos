<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWITCH STATEMENT</title>
</head>
<body>
    <?php
        $number = 10;

        switch ($number) {
            case 10:
                echo "Maradona";
                break;
            case 9:
                echo 'Ronaldo';
                break;
            case 5:
                echo 'Zidane';
                break;
            
            default:
                echo "We could not find a player";
                break;
        }
    ?>
</body>
</html>