<?php
use Core\Database;
use Core\Validator;

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 25, false)) {
    abort();
}

$db = new Database($config);


$query = "SELECT books.*, 
          CONCAT(users.first_name, ' ', users.last_name) as user_name 
          FROM books 
          LEFT JOIN users ON books.user_id = users.id 
          WHERE books.id = :id";

$book = $db->getOne($query, ['id' => $id]);

if (!$book) {
    abort();
}

view('books/show.view.php', [
    'heading' => 'Book Details',
    'book' => $book
]);