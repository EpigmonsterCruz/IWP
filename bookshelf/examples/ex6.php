<?php
/*
Write a code in PHP that prints odd numbers between 0 and 100. (Use FOR loop)

1, 3, 5, 7, .... 99
*/
$i=0;
while ($i<=100){

if ($i%2 != 0){
  echo $i."\n";
}
$i++;

}
echo "--------------------";

$i=1;
while ($i<=100){
  echo $i."\n";
  $i+=2;
}

echo "--------------------";

for($i=0; $i<=100;$i++){
  if ($i%2 != 0){
    echo $i."\n";
  }
}

echo "--------------------";

for($i=1; $i<=100;$i+=2){

    echo $i."\n";

}