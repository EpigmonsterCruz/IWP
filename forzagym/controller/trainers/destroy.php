<?php
use Core\Database;
use Core\Validator;

requireAuth();

$id = filter_input(INPUT_POST, 'id');
if (!Validator::numberVal($id, 1, 11, false)){
    abort();
}

$db = new Database($config);
$trainer = $db->getOne("SELECT * FROM trainers WHERE id = :id", ['id' => $id]);
if (!$trainer){
    abort();
}

$linkedClasses = $db->getOne("SELECT COUNT(*) as total FROM classes WHERE trainer_id = :id", ['id' => $id])['total'];
if ($linkedClasses > 0){
    header('location: ' . BASE_URL . '/trainers?msg=in_use');
    exit();
}

$db->runQuery("DELETE FROM trainers WHERE id = :id", ['id' => $id]);

header('location: ' . BASE_URL . '/trainers?msg=deleted');
exit();
