<?php

class FindFriendsController extends BaseController{
    
    public static function findusers(){
        
        $users = User::all();
        View::make('user/find_users.html', array('users' => $users));
    }
}

