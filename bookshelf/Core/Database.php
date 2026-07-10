<?php
namespace Core;
use PDO;
use PDOException;
class Database {
    public $pdo;

public function __construct($config){
    $dsn="mysql:host=$config[host];dbname=$config[dbname]; charset=$config[charset]";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES =>false,
];

try {
    $this->pdo = new PDO($dsn, $config['user'],$config['pass'],$options);
} catch (PDOException $e){
    echo "connection failed:". $e->getMessage();
    die();
}

}

public function getAll ($sql,$params=[]){
    $statement = $this->pdo->prepare($sql);
    $statement ->execute($params);
    return $statement->fetchAll();
}

public Function getOne ($sql,$params=[]){
    $statement = $this->pdo->prepare($sql);
    $statement ->execute($params);
    return $statement->fetch();
}

public Function runQuery ($sql,$params=[]){
    $statement = $this->pdo->prepare($sql);
    return $statement ->execute($params); 
}

public function insertData($sql,$params=[]){
    $statement = $this->pdo->prepare($sql);
    $statement ->execute($params); 
    return $this->pdo->lastInsertId();
}


}
