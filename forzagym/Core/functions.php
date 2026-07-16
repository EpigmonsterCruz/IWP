<?php
function vdd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function getUrl(){
    return str_replace("/forzagym", "", $_SERVER['REQUEST_URI']);
}
function urlIs($value){
    return getUrl() === $value;
}
function abort($value = 404){
    http_response_code($value);
    require base_path("views/{$value}.php");
    die();
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    return $data = htmlspecialchars($data);
}

function authorize($condition, $status = 404){
    if (!$condition){
        abort($status);
    }
    return true;
}

/* ===================== AUTH HELPERS ===================== */
function currentUser(){
    return $_SESSION['user'] ?? null;
}

function requireAuth(){
    if (!currentUser()){
        header('location: ' . BASE_URL . '/login');
        exit();
    }
}
