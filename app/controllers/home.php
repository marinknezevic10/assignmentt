<?php

//if nothing is provided this class will run and this method
class Home extends Controller //inheritance
{
    function index()
        {
            //instantiating model
            $image_class = $this->loadModel("image_class");
            //show($image_class);//checking if its an object that has returned values
            $this->view("home");//caling function from line 11, in the brackets goes name of view file
        }
    
}