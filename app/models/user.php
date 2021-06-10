<?php

class User 
{
    function login($POST)
    {
        $db = new Database();

        if(isset($POST['username']) && isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password']; 

            $query = "select * from users where username = :username && password =:password limit 1";
            $data = $db->read($query, $arr);
            
        }
    }

    function signup($POST)
    {

    }

    function check_login()
    {

    }
}