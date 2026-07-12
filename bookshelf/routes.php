<?php
$router->get('/', 'controller/index.php');
$router->get('/about', 'controller/about.php');
$router->get('/contact' , 'controller/contact.php');

$router->get('/books' , 'controller/books/index.php');
$router->delete('/books' , 'controller/books/destroy.php');

$router->get('/books/create', 'controller/books/create.php');
$router->post('/books/create', 'controller/books/store.php');

$router->get('/books/show', 'controller/books/show.php');

$router->get('/books/edit', 'controller/books/edit.php');
$router->patch('/books/edit', 'controller/books/update.php');




$routes = $router->getRoutes();
      
      $uri = parse_url(getUrl())['path'];
      $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
  /*
        if ($_POST['_method']){
          $method = $_POST['_method'];
        } else {
          $method = $_SERVER['REQUEST_METHOD'];
          }
      */
      foreach ($routes as $route){
        if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){
            return require base_path($route['controller']);
        }
      } 
      abort();
