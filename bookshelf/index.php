<?php
use Core\Router;

const BASE_PATH = __DIR__.'/';
const BASE_URL = "http://localhost/bookshelf";
function base_path(string $path){
  return BASE_PATH.$path;
}
function view(string $path, $attributes=[]){
  extract($attributes);
  require base_path("views/{$path}");
}

spl_autoload_register(
  function($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); 
    require base_path("{$class}.php");
  }
);
$config = require(base_path('config/config.php'));
require base_path('Core/functions.php');
$router = new Router();
require base_path('routes.php');
