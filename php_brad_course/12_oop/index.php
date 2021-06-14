<?php

// What is class and instance

require_once "Person.php";
require_once "Student.php";

$student = new Student("Brad", "Traversy", "1234");
echo '<pre>';
var_dump($student);
echo '</pre>';

// $person = new Person('Brad', 'Traversy');
// $person->setAge(30);
// echo '<pre>';
// var_dump($person);
// echo '</pre>';
// echo $person->getAge();
// //echo Person::$counter;
// echo Person::getCounter();

// $person = new Person();
// $person->name = 'Brad';
// $person->surname = 'Traversy';
// echo '<pre>';
// var_dump($person);
// echo '</pre>';
// echo $person->name . '<br>';

// $person2 = new Person();
// $person2->name = 'Alan';
// $person2->surname = 'Acosta';
// echo '<pre>';
// var_dump($person2);
// echo '</pre>';
// echo $person2->name . '<br>';

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter