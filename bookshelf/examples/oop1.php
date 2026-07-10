<?php
abstract class Person 
{
  public string $name="Trey";
  protected int $age=25;
  abstract public function getRole():string;

}

class Laptop 
{
  public function __construct(public string $cpu, public string $brand){

  }
  Public function getSpecs(): string
  {
    return "{$this->cpu} and {$this->brand}";
  }
}

interface Payable
{
  public function pay(): void;
}
class Student extends Person implements Payable
{
   public int $studentID;

  public function __construct(Private Laptop $laptop)
  {

  }
 public function getAge():int 
  {
    return $this->age;
  }
  Public function getRole():string
  {
    return "I am a student";
  }
  public function pay(): void
  {
    echo 'I already paid';
  }
  public function getLaptop():Laptop
  {
    return $this->laptop;
  }
}

class Teacher extends Person 
{
  public int $teacherID;
  Public function getRole():string
  {
    return "I am a Teacher";
  }

}


$laptop =new Laptop('M2', 'Mac');
$student =new Student($laptop);
echo $student->getLaptop()->cpu;
die();
$student->pay();
die();
$teacher =new Teacher();
echo $teacher->getRole();

//echo $student->age;
