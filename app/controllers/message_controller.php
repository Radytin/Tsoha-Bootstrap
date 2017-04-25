<?php

class MessageController extends BaseController{
 public static function inbox(){ 
    View::make('message/inbox.html');
    }   
}