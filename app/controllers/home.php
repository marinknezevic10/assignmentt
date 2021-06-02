<?php

//if nothing is provided this class will run and this method
class Home
{
    function index()
        {
            $this->view("home");//caling function from line 11, in the brackets goes name of view file
        }
    
    function view($view)
    {
        //if the file exists show it to user
        if(file_exists("../app/views/". $view . ".php"))
        {
            include "../app/views/". $view . ".php";
        }else{//if the file doesnt exists take the user to 404 page
            include "../app/views/404.php";
        }
    }
}