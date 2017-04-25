<?php

  
$routes->get('/', function() {
    HelloWorldController::index();
  });
$routes->get('/findfriends', function() {
    HelloWorldController::find_friends();
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

$routes->get('/users/:user_id', function($user_id){
  UserController::show($user_id);
});
$routes->get('/users/:id/edit', function($user_id){
  UserController::edit($user_id);
});
$routes->post('/users/:id/edit', function($user_id){
  UserController::update($user_id);
});

$routes->post('/users/:id/destroy', function($user_id){
  UserController::destroy($user_id);
});
$routes->get('/login', function(){
UserController::login();
});
$routes->post('/login', function(){
UserController::handle_login();
});
$routes ->post('/logout', function(){
    UserController::logout();    
});
