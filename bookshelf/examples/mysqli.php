<?php
require '../functions.php';
$host="localhost";
$dbname="bookshelf";
$user="root";
$pass="";
$charset="utf8mb4";

$conn = mysqli_connect($host,$user,$pass,$dbname);
//vdd($conn);

if (!$conn) {
  die ("connection failed:". mysqli_connect_error());
}

$sql= "SELECT * FROM books";
$results =$conn->query($sql)->fetch_all(MYSQLI_ASSOC);
//vdd($results);
foreach ($results as $result){
  echo $result['bookID'].'|'. $result['title'].'<br>';
}


$conn->close();