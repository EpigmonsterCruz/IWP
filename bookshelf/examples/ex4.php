<?php
/*
 write a foreeach loop to print number bigger than 20 in the following list:
  10,20,21,18,50,15,32,60,9,12,28
*/

$nums = [10, 20, 21, 18, 50, 15, 32, 68, 9, 12, 28];

foreach ($nums as $key => $num) {
    if ($num > 20) {
        echo $num . "\n";
    }
}

/*
 write a foreeach loop to print the largest number in the following list:
  10,20,21,18,50,15,32,60,9,12,28
*/

$nums = [10, 20, 21, 18, 50, 15, 32, 68, 9, 12, 28];
$largest = 0;

foreach ($nums as $num) {
    if ($num > $largest) {
        $largest = $num;
    }
}
echo "Largest: " . $largest;
?>