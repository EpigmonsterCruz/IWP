<?php
use Core\Database;
use Core\Validator;

$id = filter_input(INPUT_POST,'id');
if (!Validator::numberVal($id,1,25,false)){
  abort();
}
$db = new Database($config);
$book = $db->getOne("select * from books where id = :id", ['id' =>$id]);
if (!$book){
  abort();
}

$db->runQuery('delete from books where id = :id',['id' =>$id]);

header('location: '.BASE_URL.'/books');
exit();