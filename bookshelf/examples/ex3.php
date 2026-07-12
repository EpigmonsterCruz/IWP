<?php
/*
 write a foreach loop to sum all the numbers in the following array:
  [10, 20,30,40,50,60]

  1. get the numbers
  2. $sum=1;
  2. check if this is the last number then exit
  3. num= num +1
  4. go back to number 2
*/

/*$numbers = [10, 20, 30, 40, 50, 60];
$sum = 0;
foreach ($numbers as $number) {
$sum += $number;
}
echo $sum;
*/
$num=[10, 20, 30, 40, 50, 60];
$sum=0;
foreach($num as $n)
  {
    $sum = $sum+$n; 
  }
echo $sum;
