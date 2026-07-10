<?php
use Core\Database;
$year= filter_input(INPUT_GET, 'search');

If (isset($year)){
    $sql= "SELECT * FROM books where year= :year";
    $params =['year' => $year];
} else{
    $sql= "SELECT * FROM books";
    $params =[];
}
$book = New Database($config);
$books = $book->getAll($sql,$params);
view('books/index.view.php',[
    'heading'=>'List of My Books',
    'books'=>$books
]);
