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
                $_SESSION['user_url'] = $data[0]->url_address;//special id indentifier
            }else{
                
                $_SESSION['error'] = "Wrong username or password";

        }else{

            $_SESSION['error'] = "Please enter valid username and password";
        }
    }

    function signup($POST)
    {
        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['password_confirm'] = $POST['password_confirm'];
            $arr['email'] = $POST['email'];  

            $query = "insert into users (username,password,email) values(:username,:password,:email)";
            $data = $db->write($query, $arr);
            if($data)
            {
                header("Location:". ROOT . "login");
                die;
            }
            
        }else{

            $_SESSION['error'] = "Please enter valid username and password";
        }
        
        if($password != $password_confirm)
            {
                echo "Passwords not matching";
            }
    }

    function check_login()//checking if user is logged in
    {

        $db = new Database();
        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url']; 

            $query = "select * from users where url_address =:user_url limit 1";
            $data = $db->read($query, $arr);
            if(is_array($data))
            {
                //logged in
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;//special id indentifier

                return true;
            }
        }
            return false;
        
    }
}