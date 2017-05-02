<?php
class FriendController extends BaseController{
    
  public static function add_friend(){
      self::check_logged_in();
       $params = $_POST;
       
       $adder_id = $_SESSION['user'];
       
      $attributes = array(
          'adder_id'=>$adder_id,
          'friend_id'=> $user_id
          
      );
      $friend = new Friend($attributes);
      $friend->add();
      Redirect::to('/', array('message' => 'Kaveri lisätty!'));
       
       
      
  }  
  
  public static function show_all(){
        $friends = Friend::all_friends();
        View::make('user/show_user.html', array('friends' => $friends));
    }
    
}


