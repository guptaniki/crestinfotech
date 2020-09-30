<?php
// class
class Fruit {



 }
// exampale of class
class car {
  // Properties
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}

// php The __construct Function
echo "php The __construct Function"."<br>";
class car1 {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name; 
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new car1("BMW");
echo $apple->get_name()."<br>";


// php The __destruct  Function
echo "php The __destruct Function"."<br>";
class Fruit1 {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function __destruct() {
    echo "The fruit is {$this->name}."."<br>";
  }
}

$apple = new Fruit1("Apple");

// PHP - Access Modifiers
echo "PHP - Access Modifiers"."<br>";
class Fruit2 {
  public $name;
  public $color;
  public $weight;

  function set_name($n) { // a public function (default)
    $this->name = $n;
  }
  protected function set_color($n) { // a protected function
    $this->color = $n;
  }
  private function set_weight($n) { // a private function
    $this->weight = $n;
  }
}

$mango = new Fruit2();
$mango->set_name('Mango'); // OK
// $mango->set_color('Yellow'); // ERROR
// $mango->set_weight('300'); // ERROR


// Inheritance
echo "Inheritance"."<br>";
class Fruit3 {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color; 
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}."."<br>"; 
  }
}

// Strawberry is inherited from Fruit
class Strawberry extends Fruit3 {
  public function message() {
    echo "Am I a fruit or a berry? "."<br>"; 
  }
}

$strawberry = new Strawberry("Strawberry", "red");
$strawberry->message();
$strawberry->intro();

// Inheritance and the Protected Access Modifier
echo "Inheritance and the Protected Access Modifier"."<br>";
class Fruit4 {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color; 
  }
  protected function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}."."<br>"; 
  }
}

class Strawberry1 extends Fruit4 {
  public function message() {
    echo "Am I a fruit or a berry? "."<br>"; 
  }
}

// Try to call all three methods from outside class
$strawberry = new Strawberry1("Strawberry", "red");  // OK. __construct() is public
$strawberry->message(); // OK. message() is public
// $strawberry->intro(); // ERROR. intro() is protected

// Overriding Inherited Methods
echo "Overriding Inherited Methods"."<br>";
class Fruit5 {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color; 
  }
  public function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}."."<br>"; 
  }
}

class Strawberry2 extends Fruit5 {
  public $weight;
  public function __construct($name, $color, $weight) {
    $this->name = $name;
    $this->color = $color;
    $this->weight = $weight; 
  }
  public function intro() {
    echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram."."<br>"; 
  }
}

$strawberry = new Strawberry2("Strawberry", "red", 50);
$strawberry->intro();
// The final Keyword
echo"The final Keyword"."<br>";
class Fruit6 {
  final public function intro() {
  }
}

class Strawberry3 extends Fruit {
  // will result in error
  public function intro() {
  }
}

?>