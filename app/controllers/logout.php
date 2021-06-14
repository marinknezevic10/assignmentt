<?php

class Logout extends Controller 
{
    function index()
        {
            //loading user class
            $user = $this->loadModel("user");

            $user->logout();
        }
    
}