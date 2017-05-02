<?php

class Friend extends BaseModel{
    
  public $adder_id, $friend_id;
  
  public function __construct($attributes) {
        parent::__construct($attributes);
    }
  
    public static function add(){
        $query = DB::connection()->prepare('INSERT INTO Kaverit(lisaajaID, lisattavaID) VALUES (:adder_id, :friend_id)');
        $query -> execute(array('adder_id' => $this->adder_id, 'friend_id' => $this->friend_id));
        $row = $query->fetch();
        $this->friend_id = $row['friend_id'];
    }
    
    public static function all_friends(){
        
         $query = DB::connection()->prepare('SELECT * FROM Kayttaja INNER JOIN Kaverit ON user_id = lisattavaid AND lisaajaid = :adder_id ');
         $query->execute();
         $rows = $query->fetchAll();
         $friends=array();
         
         foreach ($rows as $row){
             $friends[] = new User(array(
                 'user_id' => $row['user_id'],
                 'username'=> $row['username'],
                 'password'=> $row['password'],
                 'bio' => $row['bio']
                
             ));
         }
         return $friends;
         
    }
    
}
