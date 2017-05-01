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
    public static function createMessage($user_id){
        $user = User::findId($user_id);
        View::make('message/newmessage.html', array('user' => $user));
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
        Redirect::to('/', array('message' => 'Kiitos rekisteröitymisestä!'));
          
    } else {
        View::make('user/register.html', array('errors' => $errors, 'attributes' => $attributes));
        
    }
    
  }
  public static function edit(){
      self::check_logged_in();
      $user_id = $_SESSION['user'];
      $user = User::findId($user_id);
      View::make('user/edit.html', array('attributes' => $user));
  }
  
  public static function update($user_id){
      self::check_logged_in();
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
       self::check_logged_in();
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
  public static function logout(){
      $_SESSION['user']= null;
      Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }
  
  public static function add_friend(){
      self::check_logged_in();
       $params = $_POST;
       
       $adder = $_SESSION['user'];
       
      $attributes = array(
          'user_id'=> $params['user_id']
          
      );
      $user = new User($attributes);
      $user->add();
      Redirect::to('/', array('message' => 'Kaveri lisätty!'));
       
       
      
  }
    
}

