<?php

class Message extends BaseModel{
 public $subject, $message;
 
     public function __construct($attributes) {
        parent::__construct($attributes);
       
    }
    
}

