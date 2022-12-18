<?php
/*
procedural programming => the application is based on Function
          vs
OOP (Object-oriented programming) => the application is based on Objects

Class is a template 
Object is an instance of (current copy) the class
*/

class Car  // this is class and inside the class we have property and method

{
  public $name; 
  public $has_engin = 1 ;

public function __construct($car_name) // envoked when the object is created 
{
    $this->name = $car_name;
   echo "class has been initiated <br>";
}

public function __destruct() // envoked when the object has been excuted
{ 
  echo "class was excuted <br>";
}

  public function start_engine() // this function is method in the class 
{                                        // $new_name: is parameter
  if($this->has_engin){
    echo "Engin " .$this->name . " has started! <br>";
  }
}

public function set_car_model($model)
{
  $this->model = $model; // this refere to the object 
  // we can create properties that was not defined before
}
}

$bmw = new Car("BMW");
$bmw ->name = "BMW"; // is this way we can define the property in the class
 $bmw->start_engine();
$bmw->set_car_model(2020);


$honda = new Car("honda");
$honda->has_engin = 1;
$honda->start_engine();

