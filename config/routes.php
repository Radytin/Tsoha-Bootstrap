<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });
   $routes->get('/findfriends', function() {
    HelloWorldController::find_friends();
  });
   $routes->get('/edit', function() {
    HelloWorldController::edit();
  });
   $routes->get('/login', function() {
    HelloWorldController::login();
  });
   $routes->get('/showfriend', function() {
    HelloWorldController::show_friend();
  });
  

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });
  
  
  $routes->get('/users', function(){
      UserController::index();
});

$routes->post('/users', function(){
  UserController::store();
});

$routes->get('/users/new', function(){
  UserController::create();
});

 $routes->get('/users/:user_id', function(){
      UserController::show();
});
