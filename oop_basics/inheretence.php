<?php 

// ========== Inheretence ============
 
  class Computer
  {
    public $cpu;
    public $ram = '2GB';
    public $storage;
    public $motherbord;
    public $powersubly;

    public function start_cpu()
    {
      echo "CPU is starting"; 
    }
  }

  class ATM extends Computer
  {
    public $touch_screen;
    public $money_container;
    public $card_holder;

    public function draw_money()
    {
      echo "you withdraw 500JOD";
    }
  }

  class Laptop extends Computer
  {
    public $foldable_screen;
    public $touch_pad;
    public $ram = '8GB'; // classes can override parent's properties and methods.
  }

  // // var_dump(new Computer);
  // $arab_bank_atm = new ATM;

  // $arab_bank_atm->start_cpu();
  // // var_dump(new ATM);
  // // Var_dump(new Laptop);


  // ========== Access Modifires ==========
  // Public => Protected => Pravate 
  class A 
  {
    public function public_method()
    {
      echo "Hi from public <br>";
    }

    protected function protected_method()
    {
      echo "Hi from protected <br>";
    }

    private function private_method()
    {
      echo "Hi from private method <br>";
    }
  }

  class B extends A
  {
    public function say_hi()
    {
      echo "Hi from B class <br>";
      $this->protected_method();
      // $this->private_method(); // Error
    }
  }

  // $obj = new B();
  // $obj->say_hi();
  // $obj->public_method();
  // // $obj->protected_mehtod(); // error
  // // $obj->private_method(); // error
  // var_dump($obj);


  // Modifiers example 
  class Course
  {
    protected $students = array();
    private $course_name;

    public function __construct($course_name)
    {
        $this->course_name = $course_name;
    }

    public function add_student($students)
    {
        $this->students[] = $students;
    }

    public function get_course_name()
    {
      echo $this->course_name;
    }

    
  }

  class PHP extends Course
  {

  }

  $session = new PHP('PHP');
  $session->get_course_name();
  $session->add_student('ahmad');
  $session->add_student('khaild');
  // $session->students = array('ahmaasdf', 'khaasdf', 'sdfsda');
  // $session->course_name = "python";

  var_dump($session);
