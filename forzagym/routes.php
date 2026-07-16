<?php
/* ===================== AUTH ===================== */
$router->get('/', 'controller/auth/login.php');
$router->get('/login', 'controller/auth/login.php');
$router->post('/login', 'controller/auth/authenticate.php');
$router->get('/register', 'controller/auth/register.php');
$router->post('/register', 'controller/auth/store.php');
$router->post('/logout', 'controller/auth/logout.php');

/* ===================== DASHBOARD ===================== */
$router->get('/dashboard', 'controller/dashboard.php');

/* ===================== CLIENTS ===================== */
$router->get('/clients', 'controller/clients/index.php');
$router->delete('/clients', 'controller/clients/destroy.php');
$router->get('/clients/create', 'controller/clients/create.php');
$router->post('/clients/create', 'controller/clients/store.php');
$router->get('/clients/show', 'controller/clients/show.php');
$router->get('/clients/edit', 'controller/clients/edit.php');
$router->patch('/clients/edit', 'controller/clients/update.php');

/* ===================== MEMBERSHIPS ===================== */
$router->get('/memberships', 'controller/memberships/index.php');
$router->delete('/memberships', 'controller/memberships/destroy.php');
$router->get('/memberships/create', 'controller/memberships/create.php');
$router->post('/memberships/create', 'controller/memberships/store.php');
$router->get('/memberships/show', 'controller/memberships/show.php');
$router->get('/memberships/edit', 'controller/memberships/edit.php');
$router->patch('/memberships/edit', 'controller/memberships/update.php');

/* ===================== CLASSES ===================== */
$router->get('/classes', 'controller/classes/index.php');
$router->delete('/classes', 'controller/classes/destroy.php');
$router->get('/classes/create', 'controller/classes/create.php');
$router->post('/classes/create', 'controller/classes/store.php');
$router->get('/classes/show', 'controller/classes/show.php');
$router->get('/classes/edit', 'controller/classes/edit.php');
$router->patch('/classes/edit', 'controller/classes/update.php');

/* ===================== TRAINERS ===================== */
$router->get('/trainers', 'controller/trainers/index.php');
$router->delete('/trainers', 'controller/trainers/destroy.php');
$router->get('/trainers/create', 'controller/trainers/create.php');
$router->post('/trainers/create', 'controller/trainers/store.php');
$router->get('/trainers/show', 'controller/trainers/show.php');
$router->get('/trainers/edit', 'controller/trainers/edit.php');
$router->patch('/trainers/edit', 'controller/trainers/update.php');

/* ===================== PAYMENTS ===================== */
$router->get('/payments', 'controller/payments/index.php');
$router->delete('/payments', 'controller/payments/destroy.php');
$router->get('/payments/create', 'controller/payments/create.php');
$router->post('/payments/create', 'controller/payments/store.php');
$router->get('/payments/show', 'controller/payments/show.php');
$router->get('/payments/edit', 'controller/payments/edit.php');
$router->patch('/payments/edit', 'controller/payments/update.php');


$routes = $router->getRoutes();

$uri = parse_url(getUrl())['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

foreach ($routes as $route){
    if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){
        return require base_path($route['controller']);
    }
}
abort();
