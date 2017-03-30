<?php

class UserController extends BaseController{
    
    public static function index(){
        
        $users = User::all();
        View::make('user/users.html', array('users' => $users));
    }
    
    public static function show($user_id){
        
        $user = User::findId($user_id);
        View::make('user/show_users.html', array('user' => $user));
    }
    public static function create(){
        View::make('user/register.html');
    }

    

    public static function store(){
        
        $params = $_POST;
        $users =  New User(array(
            'username' => $params['username'],
            'password' => $params['password'],
            'bio' => $params['bio']
            
        ));
         Kint::dump($params);
        $game->save();
         //Redirect::to('/users/' . $user->user_id, array('message' => 'Kiitos rekisteröitymisestä!'));
          
    }
    public function save(){
        $query = DB::connection()->prepare('INSERT INTO Game (username, password, bio) VALUES (:username, :password, :bio) RETURNING user_id');
        $query -> execute(array('username' => $this->username, 'password' => $this->password, 'bio' => $this->bio));
        $row = $query->fetch();
        Kint::trace();
        Kint::dump($row);
        // $this->user_id = $row['user_id'];
         
    }
    
    
}

