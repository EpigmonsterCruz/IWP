<?php
class Student 
{
private int $age=30;
public function __construct(public int $id,public string $name)
{
  $this->id=$id;
  $this->name=$name;
  //$this->age =$age;
  //echo "this is age: {$this->age}";
}

public function getAge():int {
return $this->age;
}

public function setAge(int $age) {
  $this->age=$age;
}

public function introduce()
{
  echo "this is a class for student: {$this->name} with id: {$this->id} and age: {$this->age}";
}
}

class StudentDTO
{
  public function __construct(public int $id,public string $name,public int $age)
  {}
}

//$dto = new StudentDTO(4575,'alaeddin',30);
//echo $dto->age;
//die();
$student1 = new Student(6565,'trey');
echo $student1->getAge();
$student1->setAge(25);
echo " ---- ". $student1->getAge();


//echo $student1->name;
//echo $student1->age;
//$student1->age = 50;
//$student1->id = 1542;
//$student1->introduce();