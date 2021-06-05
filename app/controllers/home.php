<?php

//if nothing is provided this class will run and this method
class Home extends Controller //inheritance
{
    function index()
        {
            $data['page_title'] = 'Home';
            $this->view("template/index", $data);//in the brackets goes name of view file
        }
    
}