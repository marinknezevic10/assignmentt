<?php

class User 
{
    function login($POST)
    {
        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password']; 

            $query = "select * from users where username = :username && password =:password limit 1";
            $data = $db->read($query, $arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['username'] = $data[0]->username;
            }else{
                
                $_SESSION['error'] = "Wrong username or password";

        }else{

            $_SESSION['error'] = "Please enter valid username and password";
        }
    }

    function signup($POST)
    {

    }

    function check_login()
    {

    }
}