<?php
// Class Constants
echo "Class Constants"."<br>";
class Goodbye {
  const LEAVING_MESSAGE = "Thank you for visiting Crest Infotech!"."<br>";
  public function byebye() {
    echo self::LEAVING_MESSAGE;
  }
}

$goodbye = new Goodbye();
$goodbye->byebye();

// Abstract Classes and Methods
echo "Abstract Classes and Methods"."<br>";
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract public function intro() : string; 
}

// Child classes
class Audi extends Car {
  public function intro() : string {
    return "Choose German quality! I'm an $this->name!"; 
  }
}

class Volvo extends Car {
  public function intro() : string {
    return "Proud to be Swedish! I'm a $this->name!"; 
  }
}

class Citroen extends Car {
  public function intro() : string {
    return "French extravagance! I'm a $this->name!"; 
  }
}

// Create objects from the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();

// Interfaces
echo "<br>"."Interfaces"."<br>";
interface Animal {
  public function makeSound();
}

class Cat implements Animal {
  public function makeSound() {
    echo "Meow"."<br>";
  }
}

$animal = new Cat();
$animal->makeSound();
// Traits
echo"trait"."<br>";
trait message1 {
public function msg1() {
    echo "OOP is fun! "."<br>";
  }
}

class Welcome {
  use message1;
}

$obj = new Welcome();
$obj->msg1();
//Static Methods
echo "Static Methods"."<br>";
class greeting {
  public static function welcome() {
    echo "crest infotech welcome  World!"."<br>";
  }
}

// Call static method
greeting::welcome();

// Static Properties
echo "Static Properties"."<br>";
class pi {
  public static $value = 3.14159;
}

// Get static property
echo pi::$value;
?>