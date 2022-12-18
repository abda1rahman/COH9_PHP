<?php
// ============= php Abstrucks ===========
abstract class musicalInstruments 
{
  public $owner;
  abstract public function play_sound();

  abstract public function add_owner($owner);

  abstract public function get_owner_name() : string;
}

class Piano extends musicalInstruments 
{
  public function play_sound(){
    echo "do re me";
  }

  public function add_owner($owner)
  {
    $this->owner = $owner;
  }

  public function get_owner_name() :string
  {
    return $this->owner;
  }
}


class Drums extends musicalInstruments
{
  public function play_sound(){

  }
}

$yamaha = new Piano();
$yamaha->play_sound();
$yamaha->$owner = "Roy";
var_dump($yamaha);
