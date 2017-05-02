<?php

class MessageController extends BaseController{
 public static function inbox(){ 
    View::make('message/inbox.html');
    }
    
  public static function send($user_id){
        $params = $_POST;
        $sender_id = $_SESSION['user'];
        $attributes = array(
            'sender_id'=>$sender_id,
            'receiver_id'=>$user_id,
            'subject' => $params['subject'],
            'message' => $params['message']  
        );
        $message = new Message($attributes);
        $message->newmessage();
        Redirect::to('/', array('message' => 'Viesti lähetetty!'));
          
   
    
  }
  
   public static function show_messages(){
       $messages = Message::all_messages($user_id);
       View::make('message/inbox.html', array('messages' => $messages));
    }
     
      
      
  }
    
    
