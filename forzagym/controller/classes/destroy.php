<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$class = $db->getOne("SELECT * FROM classes WHERE id = :id", ['id' => $id]);
if (!$class){
    abort();
}

$db->runQuery("DELETE FROM classes WHERE id = :id", ['id' => $id]);

header('location: ' . BASE_URL . '/classes?msg=deleted');
exit();
