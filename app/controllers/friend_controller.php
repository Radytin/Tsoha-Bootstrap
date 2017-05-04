<?php
class FriendController extends BaseController{
    
  public static function add_friend($user_id){
      self::check_logged_in();
       $params = $_POST;
       $adder_id = $_SESSION['user'];
       
      $attributes = array(
          'adder_id'=>$adder_id,
          'friend_id'=> $params['user_id']
          
      );
      $friend = new Friend($attributes);
      $friend->add();
      Redirect::to('/', array('message' => 'Kaveri lisätty!'));
       
       
      
  }  
  
  public static function show_all($user_id){
        $friends = Friend::all_friends($user_id);
        View::make('user/show_user.html', array('friends' => $friends));
    }
    
}


