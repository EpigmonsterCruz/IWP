<?php
/*
this is the answer to the midterm's question number 41
*/
abstract class Vehicle{
  public string $brand;
  public abstract function start();
}
interface Drivable
{
  public function drive();
}
class Car extends Vehicle implements Drivable
{
public function start()
{
echo "Vehicle started";
}
public function drive()
{
echo "Car is driving";
}
}

