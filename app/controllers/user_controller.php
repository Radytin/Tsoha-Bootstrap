<?php

class UserController extends BaseController{
    
    public static function index(){
        
        $users = User::all();
        View::make('user/find_users.html', array('users' => $users));
    }
    public static function show($user_id){
        
        $users = User::findId($user_id);
        View::make('user/show_users.html', array('user' => $user));
    }
    
}

