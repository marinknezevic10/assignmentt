<?php

//url router it will get whatever is in url and run specific class name with specific function inside
//all the functionality starts from here
class App
{

    private $controller = "home";
    private $method = "index";
    private $params = [];

    //construct runs immediately
    public function __construct()
    {
        //$this for using the function inside the class
        $url = $this->splitURL();

        //this router is responsible for selecting which controller is going to run for our website at the time
        //if file exists it means controller exists so we proceed
        if(file_exists("../app/controllers/". strtolower($url[0]) . ".php"))
        {
            //we change it from default to whatever controller is set
            $this->controller = strtolower($url[0]);
            unset($url[0]);//remove it from the array
        }
        //here we use this controller in case we dont find set controller so it remains "home" as default...
        require "../app/controllers/".  $this->controller . ".php";
        $this->controller = new $this->controller;

        //if the second variable is set in the url continue
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);//so its removed from the array
            }
        }
    
        $this->params = array_values($url);//[0],[1],[2]...
        //run the class and method
        call_user_func_array([$this->controller,$this->method], $this->params);

    }

    //spliting url so we can get individual components and use them to access to 
    //access particular page and particular content 
    private function splitURL()
    {
        //explode converts string into an array,trim removes what you want
        //filter_var for protection!!(ex. someone can put malicious code in url)
        return explode("/", filter_var(trim($_GET['url'],"/"), FILTER_SANITIZE_URL));
    }
}

