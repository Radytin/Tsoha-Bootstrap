<?php

class UserController extends BaseController{
    
    public static function index(){
        
        $users = User::all();
        View::make('user/users.html', array('users' => $users));
    }
    
    public static function show($user_id){
        
        $user = User::findId($user_id);
        View::make('user/show_user.html', array('user' => $user));
    }
    public static function create(){
        View::make('user/register.html');
    }

    

    public static function store(){
        
        $params = $_POST;
        $user =  New User(array(
            'username' => $params['username'],
            'password' => $params['password'],
            'bio' => $params['bio']
            
        ));
        $user-> save();
        Redirect::to('/users/' . $user->user_id, array('message' => 'Kiitos rekisteröitymisestä!'));
          
    }
    
    
    
}

