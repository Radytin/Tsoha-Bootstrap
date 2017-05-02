<?php

class Message extends BaseModel{
 public $sent_id, $msg_id, $sender_id, $receiver_id, $subject, $message;
 
     public function __construct($attributes) {
        parent::__construct($attributes);
       
    }
    
    public function newmessage(){
        
        $query = DB::connection()->prepare('INSERT INTO Viesti (aihe, sisalto) VALUES (:subject,:message) RETURNING msg_id');
        $query -> execute(array('subject' => $this->subject, 'message' => $this->message));
        $row = $query->fetch();
        $this->msg_id = $row['msg_id'];
        self::newsentmessage();
        
    }
    
    public function newsentmessage(){
        
        $query = DB::connection()->prepare('INSERT INTO Kayttajanviesti (viestinid, lahettajaid, vastaanottajaid) VALUES (:msg_id, :sender_id, :receiver_id) RETURNING sent_id');
        $query -> execute(array('msg_id' => $this->msg_id, 'sender_id' => $this->sender_id, 'receiver_id' => $this->receiver_id));
        $row = $query->fetch();
        $this->sent_id = $row['sent_id'];
        
    }
    
    public function all_messages(){
        
         $query = DB::connection()->prepare('SELECT * FROM Viesti INNER JOIN Kayttajanviesti ON msg_id = viestinid AND vastaanottajaid = :receiver_id ');
         $query->execute();
         $rows = $query->fetchAll();
         $friends=array();
         
         foreach ($rows as $row){
             $messages[] = new Message(array(
                 'sent_id' => $row['sent_id'],
                 'msg_id'=> $row['msg_id'],
                 'sender_id'=> $row['sender_id'],
                 'receiver_id' => $row['receiver_id'],
                 'subject'=> $row['subject'],
                 'message' => $row['message']
               
                
             ));
         }
         return $friends;
         
    }
    }
     


