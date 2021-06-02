<?php

//main controller
//here we create functionallity that is used in all controllers
class Controller 
{
    protected function view($view)
    {
        //if the file exists show it to user
        if(file_exists("../app/views/". $view . ".php"))
        {
            include "../app/views/". $view . ".php";
        }else{//if the file doesnt exists take the user to 404 page
            include "../app/views/404.php";
        }
    }

    //one more function which allows us to load a model
    protected function loadModel($model)
    {
        if(file_exists("../app/models/". $model . ".php"))
        {
            include "../app/models/". $model . ".php";
            //instantiating class, assigning it to a variable
            return $model = new $model();
        }
        return false;
    }
}