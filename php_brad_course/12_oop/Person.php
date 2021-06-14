<?php
// on latest php versions > 7.4 we can specified data types like e.g. "public string $name";

class Person {
  public string $name;
  public string $surname;
  // private ?int $age; // ?int means that this variable accepts null values
  protected ?int $age;
  public static int $counter = 0;

  public function __construct($name, $surname)
  {
    $this->name = $name;
    $this->surname = $surname;
    $this->age = null;
    self::$counter++;
  }

  public function setAge($age) {
    $this->age = $age;
  }

  public function getAge() {
    return $this->age;
  }

  public static function getCounter() {
    return self::$counter;
  }
}