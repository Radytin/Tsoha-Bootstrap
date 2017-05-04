<?php

class Friend extends BaseModel{
    
  public $relation_id, $adder_id, $friend_id;
  
  public function __construct($attributes) {
        parent::__construct($attributes);
    }
  
    public static function add(){
        $query = DB::connection()->prepare('INSERT INTO Kaverit(lisaajaID, lisattavaID) VALUES (:adder_id, :friend_id) RETURNING relation_id');
        $query -> execute(array('adder_id' => $this->adder_id, 'friend_id' => $this->friend_id));
        $row = $query->fetch();
      
        $this->relation_id = $row['relation_id'];
    }
    
    public static function all_friends($adder_id){
        
         $query = DB::connection()->prepare('SELECT * FROM Kayttaja INNER JOIN Kaverit ON user_id = lisattavaid AND lisaajaid = :adder_id ');
         $query->execute(array('adder_id' => $adder_id));
         $rows = $query->fetchAll();
         $friends=array();
         
         foreach ($rows as $row){
             $friends[] = new Friend(array(
                 'relation_id' => $row['relation_id'],
                 'username'=> $row['username']
               
                
             ));
         }
         return $friends;
         
    }
    
}
