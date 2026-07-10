<?php
/*
 Write a loop using foreach to show each city mentioned in the following array: (1 pt)
$cities = ["London", "Paris", “Rome"];

 loop (Array lenght)
 {
  show $cities[x];
 
 }
london
paris 


*/
$cities = ["London", "Paris", "Rome"];

foreach ($cities as $key=>$city){
  echo $key.".".$city."\n ";

} 

$cities = [
  "city1"=>"London", 
  "city2"=>"Paris", 
  "city3"=>"Rome"
  ];
foreach ($cities as $key=>$city){
  echo $key.".".$city."\n ";

} 
