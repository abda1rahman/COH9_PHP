<?php

// use Core\Controller\Items;
// use Core\Database\DB;
use Core\Router;
// use functional\Router as functionalRouter;

// include "./Core/Router.php";
// include './Core/Controller/item.php';
// include './Core/Database/DB.php';
// INSTEDE OF:
spl_autoload_register(function($classname){
      $classname = str_replace('\\',"/",$classname);
      $file_path = __DIR__."/".$classname.".php";  
      require_once $file_path;
}); 



// $router = new Core\Router();
// $Items = new Core\Controller\Items();
// $DB = new Core\Database\DB();
// router2 = new FunctionalRouter();

// var_dump($router);
// var_dump($Items);
// var_dump($DB);

// Routing tool (Instence)
// $router = new Router();
// $router->add('GET','/items);

// Routing tool (static)

// Router::add('GET', '/items');


// $router->add('POST', '/items');
// $router->add('UPDATE', '/items/1');
// $routes->redirect();
// Todo List Items tool
// Routes to perform CRUD operations
// Get all items 
Router::get('/items', 'items.index');
Router::get('/items/single', 'items.single');
// Create item
Router::post('/items/create', 'items.create');
// Update item
Router::put('/items/update', 'items.update');
// Delete item
Router::delete('/items/delete', 'items.delete');


Router::redirect();





// namespace : 
// extension PHP Namespaces for automatically import namespace 
// - use backword slash \ on other hand directory use forword slash /