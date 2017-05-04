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
  FriendController::show_all($user_id);
});
$routes->post('/users/:user_id/add', function(){
FriendController::add_friend();
});
$routes->get('/edit', function(){
  UserController::edit();
});
$routes->post('/edit', function(){
  UserController::update();
});

$routes->post('/edit/destroy', function(){
  UserController::destroy();
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
$routes->get('/messages', function(){
MessageController::show_messages();
});
$routes->get('/users/:user_id/message', function($user_id){
UserController::createMessage($user_id);    
});
$routes->post('/users/:user_id/message', function($user_id){
    MessageController::send($user_id);    
});