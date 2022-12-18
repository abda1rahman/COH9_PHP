<?php
class AppleDevice 
{
  // properties 
  public $ram = "8 GB";
  public $display = "1080 X 720";
  public $space = '500 GB';
  public $color = 'black';
  public $ownername = 'dfdas';

  const OWNERNAME = 5;

  // methods 
  public function setownername(){
    if(strlen($this->ownername) < self::OWNERNAME){
      echo "owner name can't be less than 3 charts";
    }else{
      echo "your name has been set";
    }
  }

}

$apple6plus = new AppleDevice;
$apple6plus->ram = '2GB';
$apple6plus->colors = 'Red';
$apple6plus->display = '4inch';
$apple6plus->reslution = '1900X1700';
//$apple6plus->ownername = 'abdsf';
$apple6plus->setownername();
var_dump($apple6plus);