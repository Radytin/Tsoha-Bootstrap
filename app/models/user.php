<?php

class User extends BaseModel{
    
    public $id, $username, $password, $bio, $olutseura, $peliseura, $opiskeluseura;
     public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public static function all(){
        //Alusta kysely tietokantayhteydellä
         $query = DB::connection()->prepare('SELECT * FROM Kayttaja');
         //Suorita kysely
         $query->execute();
         //Hae rivit
         $rows->$query->fetchAll();
         $users=array();
         
         foreach ($rows as $row){
             $users = new User(array(
                 'id' => $row['id'],
                 'username'=> $row['username'],
                 'bio' => $row['bio'],
                 'olutseura' => $row['olutseura'],
                 'peliseura' => $row['peliseura'],
                 'opiskeluseura' => $row['olutseura']
                 
            
                 
                 
             ));
         }
         return $users;
         
    }
    
    public static function findOlutseura(){
         $query=DB::connection() ->prepare('SELECT * FROM Kayttaja WHERE olutseura');
         $query->execute();
         $rows->$query->fetch();
         $users=array();
         foreach ($rows as $row){
             $users = new User(array(
                 'id' => $row['id'],
                 'username'=> $row['username'],
                 'bio' => $row['bio'],
                 'olutseura' => $row['olutseura'],
                 'peliseura' => $row['peliseura'],
                 'opiskeluseura' => $row['olutseura']
                 
            
                 
                 
             ));
         }
         return $users;
        
    }
    public static function findPeliseura(){
         $query=DB::connection() ->prepare('SELECT * FROM Kayttaja WHERE peliseura');
         $query->execute();
         $rows->$query->fetch();
         $users=array();
         foreach ($rows as $row){
             $users = new User(array(
                 'id' => $row['id'],
                 'username'=> $row['username'],
                 'bio' => $row['bio'],
                 'olutseura' => $row['olutseura'],
                 'peliseura' => $row['peliseura'],
                 'opiskeluseura' => $row['olutseura']
                 
            
                 
                 
             ));
         }
         return $users;
        
    }
    public static function findOpiskeluseura(){
         $query=DB::connection() ->prepare('SELECT * FROM Kayttaja WHERE opiskeluseura');
         $query->execute();
         $rows->$query->fetch();
         $users=array();
         foreach ($rows as $row){
             $users = new User(array(
                 'id' => $row['id'],
                 'username'=> $row['username'],
                 'bio' => $row['bio'],
                 'olutseura' => $row['olutseura'],
                 'peliseura' => $row['peliseura'],
                 'opiskeluseura' => $row['olutseura']
                 
            
                 
                 
             ));
         }
         return $users;
        
    }
    

}

