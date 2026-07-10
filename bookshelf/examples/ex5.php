<?php
/*
write a while loop that calculates the sum of all numbers from 1 to 100

while(condition)
{

}

*/

$num = 1;
$sum = 0;

while ($num <= 100) {
    $sum += $num;
    $num++;
}

echo $sum;


