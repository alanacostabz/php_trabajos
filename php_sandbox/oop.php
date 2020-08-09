<?php
class Person
{
  private $name;
  public $email;
  public static $ageLimit = 40;
  private static $ageLimit1 = 40;

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
    echo __CLASS__ . ' created<br>';
  }

  public function __destruct()
  {

    echo __CLASS__ . ' destroyed<br>';
  }

  public function setName($name)
  {
    return $this->name = $name . '<br>';
  }

  public function getName()
  {
    return $this->name  . '<br>';
  }

  public function setEmail($email)
  {
    return $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email  . '<br>';
  }

  public static function getAgeLimit1()
  {
    return self::$ageLimit1;
  }
}

# Static props and method
//echo Person::$ageLimit;
//echo Person::getAgeLimit1();

//$person1 = new Person('John Frusciante', 'jfr@rhcp.com');
// $person1->setName('John Frusciante');
//echo $person1->getName();

// $person1->name = 'John Frusciante';
// echo $person1->name;

class Customer extends Person
{
  private $balance;

  public function __construct($name, $email, $balance)
  {
    parent::__construct($name, $email, $balance);
    $this->balance = $balance;
    $this->name = $name;
    $this->email = $email;
    echo 'A new ' . __CLASS__ . ' has been created<br>';
  }

  public function setBlance($balance)
  {
    return $this->balance = $balance;
  }

  public function getBalance()
  {
    return $this->balance  . '<br>';
  }
}

// $customer1 = new Customer('John Frusciante', 'jfr@rhcp.com', 300);

// echo $customer1->getBalance();
