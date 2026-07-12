<?php
require '../functions.php';
$host="localhost";
$dbname="bookshelf";
$user="root";
$pass="";
$charset="utf8mb4";

$dsn="mysql:host=$host;dbname=$dbname; user=$user;password=$pass;charset=$charset";
$pdo = new PDO($dsn);
$sql= "SELECT * FROM books";
$results = $pdo->prepare($sql);
$results->execute();
$results = $results->fetchAll(PDO::FETCH_ASSOC);
//vdd($results);

foreach ($results as $result){
  echo $result['bookID'].'|'. $result['title'].'<br>';
}

$conn->close();