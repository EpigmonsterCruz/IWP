<?php
/*
write a for loop that count how many even numbers exist between 1 and 100
 2, 4, 6, 8, 10, ...., 98

*/
$count=0;
for ($i=2; $i<100; $i+=2){
  $count++;
}
echo  $count;