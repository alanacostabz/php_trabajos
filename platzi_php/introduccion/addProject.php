<?php
require_once 'vendor\autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'cursophp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

if (!empty($_POST)) {
    $Project = new Project();
    $Project->title = $_POST['title'];
    $Project->description = $_POST['description'];
    $Project->save();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <title>Add Project</title>
</head>

<body>
    <h1>Add Project</h1>
    <form action="addProject.php" method="POST">
        <label for="">Title</label>
        <input type="text" name="title"><br>
        <label for="">Description</label>
        <input type="text" name="description"><br>
        <button type="submit">Saves</button>
    </form>
</body>

</html>