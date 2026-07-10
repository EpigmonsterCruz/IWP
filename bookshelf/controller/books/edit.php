<?php
use Core\Database;
use Core\Validator;

$id = filter_input(INPUT_GET, 'id');
if (!Validator::numberVal($id, 1, 25, false)) {
    abort();
}

$data = new Database($config);
$book = $data->getOne("select * from books where id = :id", ['id' => $id]);

if (!$book) {
    abort();
}


$users = $data->getAll("SELECT id, full_name FROM users");

$error = [];

view('books/edit.view.php', [
    'heading' => 'Edit Book',
    'error' => $error,
    'book' => $book,
    'users' => $users 
]);