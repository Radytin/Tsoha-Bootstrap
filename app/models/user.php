<?php

class User extends BaseModel{
    
    public $user_id, $username, $password, $bio;
     public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all(){
        //Alusta kysely tietokantayhteydellä
         $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
         $query->execute();
         $rows = $query->fetchAll();
         $users=array();
         
         foreach ($rows as $row){
             $users = new User(array(
                 'user_id' => $row['user_id'],
                 'username'=> $row['username'],
                 'password'=> $row['password'],
                 'bio' => $row['bio']
                
             ));
         }
         return $users;
         
    }
    
    public static function findId($user_id){
        $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE user_id = :user_id LIMIT 1');
        $query->execute(array('user_id' => $user_id));
        $row = $query->fetch();
        
         
         if($row){
             $user = new User(array(
                 'user_id' => $row['user_id'],
                 'username'=> $row['username'],
                 'password'=> $row['password'],
                 'bio' => $row['bio']
             
                 
             ));
         
             return $user;
         }
         
         return null;
            
        
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

