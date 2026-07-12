<?php
use Core\Database;

$db = new Database($config);

$users = $db->getAll("SELECT id, first_name, last_name FROM users");

$book = [];
$error = [];

view('books/create.view.php', [
      'heading' => 'Add a New Book',
      'error' => $error,
      'book' => $book,
      'users' => $users 
]);