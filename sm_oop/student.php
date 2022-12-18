<?php
require_once './db.php';

class Student
{



  function __construct()
  {
    $this->db = new DB();
  }

  public function get_student(): array
{
  $students = array();
  $result = $this->db->send_query("SELECT * FROM s_management");
  if($result->num_rows > 0){
    while($row = $result->fetch_object()){
      $students [] = $row;
    }
    var_dump($students);die;
  }
  return $students;
}

  public function create($student_information)
  {
    $validation = $this->validate_student_info($student_information);
    if($validation != true)
        return $validation;
  

    // create sql
    $name = $student_information['name'];
    $dob = $student_information['dob'];
    $phone = $student_information['phone'];
    $email = $student_information['email'];
    $gender = $student_information['gender'];
    
    $sql = "INSERT INTO s_management (full_name, dob, gender, phone, email) VALUES ('$name','$dob','$gender','$email','$phone')";
    $this->db->send_query($sql);

    return true;
    
  }


  protected function validate_student_info($student_information)
  {
        // validate student information 
        if(empty($student_information))
        return "Empty Student Information";
      if(!isset($student_information['name']))
        return "Student Name is required";
      if(!isset($student_information['gender']))
        return "Student gender is required";
      if($student_information['gender'] != 'male' && $student_information['gender'] != 'female')
        return "Student gender should be male or female";

        return true;
  }


}
