<?php
use Core\Database;
use Core\Validator;

$data = new Database($config);
$book = [];
$error = [];

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


$book['full_name'] = filter_input(INPUT_POST, 'user');

if (empty($error)){
      try {
      
            $bookID = $data->insertData("insert into books (title, author, publisher, year, ISBN, full_name) 
            values (:title, :author, :publisher, :year, :ISBN, :full_name)", [
                  'title' => $book['title'],
                  'author' => $book['author'],
                  'publisher' => $book['publisher'],
                  'year' => $book['year'],
                  'ISBN' => $book['ISBN'],
                  'full_name' => $book['full_name'] 
            ]);
            header("location: ".BASE_URL."/books?x=$bookID");
            exit();
      } catch (PDOException $e){
            echo "error: ".$e->getMessage();
      }
}

view('books/create.view.php', [
      'heading' => 'Add a New Book',
      'error' => $error,
      'book' => $book
]);