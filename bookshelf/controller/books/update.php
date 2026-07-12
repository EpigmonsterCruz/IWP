<?php
use Core\Database;
use Core\Validator;

$data = new Database($config);

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 25, false)) {
    abort();
}

$existingBook = $data->getOne("select * from books where id = :id", ['id' => $id]);
if (!$existingBook) {
    abort();
}

$book = [];
$error = [];
$book['id'] = $id;

$book['title'] = filter_input(INPUT_POST,'title');
if (!Validator::textVal($book['title'],1,225)){
      $error['title']="Title must be between 1 and 225 characters";
}
$book['author'] = filter_input(INPUT_POST,'author');
if (!Validator::textVal($book['author'],1,200)){
      $error['author']="Author must be between 1 and 225 characters";
}
$book['publisher'] = filter_input(INPUT_POST,'publisher');
if (!Validator::textVal($book['publisher'] ,1,225)){
      $error['publisher']="Publisher must be between 1 and 225 characters";
}
$book['year'] = filter_input(INPUT_POST,'year');
if (!Validator::numberVal($book['year'],4,4,false)){
      $error['year']="year must be 4 digits and  cannot be started with 0";
}
$book['ISBN'] = filter_input(INPUT_POST,'ISBN');
if (!Validator::numberVal($book['ISBN'],11,13,false)){
      $error['ISBN']="ISBN must be between 10 and 14 digits";
}

$book['user_id'] = filter_input(INPUT_POST, 'user');

if (empty($error)){
      try {
      
            $data->runQuery(
                "update books set title = :title, author = :author,
                 publisher = :publisher, year = :year, ISBN = :ISBN, user_id = :user_id
                 where id = :id",
                [
                  'title' => $book['title'],
                  'author' => $book['author'],
                  'publisher' => $book['publisher'],
                  'year' => $book['year'],
                  'ISBN' => $book['ISBN'],
                  'user_id' => $book['user_id'], 
                  'id' => $id,
                ]
            );
            header("location: ".BASE_URL."/books?x=$id");
            exit();
      } catch (PDOException $e){
            echo "error: ".$e->getMessage();
      }
}

$users = $data->getAll("SELECT id, first_name, last_name FROM users");

view('books/edit.view.php', [
      'heading' => 'Edit Book',
      'error' => $error,
      'book' => $book,
      'users' => $users
]);