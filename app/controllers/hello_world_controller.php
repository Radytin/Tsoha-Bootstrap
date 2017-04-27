<?php

  class HelloWorldController extends BaseController{

    public static function index(){
     
   	 View::make('home.html');
    }
    public static function find_friends(){
    View::make('suunnitelmat/find_friends.html');
    }
  
    public static function login(){
    View::make('suunnitelmat/login.html');
    }
    public static function show_friend(){
    View::make('suunnitelmat/show_friend.html');
    }

    public static function sandbox(){
    $user_id = $_SESSION['user'];;
    $user = User::findId($user_id);
    Kint::dump($user);
      
    }
  }
