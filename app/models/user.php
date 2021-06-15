<?php

class User 
{
    function login($POST)
    {
        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['password']))
        {
            //assigning username and password to an array
            $arr['username'] = $POST['username'];
            $arr['password'] = md5($POST['password']);

            //we are not using variables because these are gonna be prepared statements :username :password
            $query = "select * from users where username = :username && password =:password  limit 1";
            $data = $db->read($query, $arr);
            if(is_array($data))
            {
                //logged in
 
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;//special id indentifier

                header("Location:" . ROOT . "home");
                die;
                
            }else{
                
                $_SESSION['error'] = "Wrong username or password";
            }
        }else{

            $_SESSION['error'] = "Please enter valid username and password";
        }
    }

    function signup($POST)
    {

        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && ($POST['password']))
        {

            if ($_POST['password'] === $_POST['password_confirm']) {
            
            }
            else {
                $_SESSION['error'] = "Passwords don't match";
               return false;
            }
    
        $arr['username'] = $POST['username'];
        $arr['password'] = md5($POST['password']);
        $arr['password_confirm'] = md5($POST['password_confirm']);
        $arr['email'] = $POST['email'];
        $arr['url_address'] = get_random_string_max(60);
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into users (username,password,password_confirm,email,url_address,date) values(:username,:password,:password_confirm,:email,:url_address,:date)";
        $data = $DB->write($query, $arr);
            if($data)
            {

                header("Location:" . ROOT . "home");
                die;
            }

        }else{

            $_SESSION['error'] = "please enter valid username and password";
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
  
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;//special id indentifier

                return true;
            }
        }
            return false;
        
    }

    function logout()
    {

        unset($_SESSION['user_name']);
        unset($_SESSION['user_url']);

        header("Location:" . ROOT . "login");
                die;
    }
}