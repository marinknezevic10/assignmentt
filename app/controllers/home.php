<?php

//if nothing is provided this class will run and this method
class Home extends Controller //inheritance
{
    function index()
        {
            $db = new Database();
            $data = $db->read("select * from images");
            show($data[0]->image);
            $this->view("home");//in the brackets goes name of view file
        }
    
}