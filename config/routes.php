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
  
  
  $routes->get('/findusers', function(){
      FindFriendsController::findusers();
});
