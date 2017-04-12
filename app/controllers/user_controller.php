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
        $attributes = array(
            'username' => $params['username'],
            'password' => $params['password'],
            'bio' => $params['bio']
            
        );
        $user = new User($attributes);
        $errors = $user ->errors();
        if(count($errors) == 0){
        $user-> save();
        Redirect::to('/users/' . $user->user_id, array('message' => 'Kiitos rekisteröitymisestä!'));
          
    } else {
        View::make('user/register.html', array('errors' => $errors, 'attributes' => $attributes));
        
    }
    
  }
  public static function edit($user_id){
      $user = User::findId($user_id);
      View::make('user/edit.html', array('attributes' => $user));
  }
  
  public static function update($user_id){
      $params = $_POST;
      
      $attributes = array(
          'user_id'=> $user_id,
          'username' => $params['username'],
          'password' => $params['password'],
          'bio' => $params['bio']
          
      );
      $user = new User($attributes);
      $errors = $user ->errors();
      
      if(count($errors) > 0){
          View::make('user/edit.html', array('errors' => $errors, 'attributes' => $attributes));
      }else{
          $user-> update();
          Redirect::to('/users/' . $user->user_id, array('message' => 'Tietojasi on muokattu onnistuneesti!'));
      }
      
  }
  public static function destroy(){
      $user = new User(array('user_id' => $user_id));
      $user -> destroy();
      Redirect::to('/users', array('message' => 'Käyttäjätunnuksesi on poistettu onnistuneesti!'));
  }
  public static function login(){
      View::make('user/login.html');
  }
  public static function handle_login(){
      $params = $_POST;
      $user = User::authenticate($params['username'],$params ['password']);
      if(!$user){
          View::make('user/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
      }else{
           $_SESSION['user'] = $user->user_id;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin ' . $user->username . '!'));
      }
      
  }
    
}

