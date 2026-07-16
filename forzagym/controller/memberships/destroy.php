<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$membership = $db->getOne("SELECT * FROM memberships WHERE id = :id", ['id' => $id]);
if (!$membership){
    abort();
}

$db->runQuery("DELETE FROM memberships WHERE id = :id", ['id' => $id]);

header('location: ' . BASE_URL . '/memberships?msg=deleted');
exit();
