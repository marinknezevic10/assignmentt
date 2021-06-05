<?php

class About extends Controller
{
    function index()
        {
            $data['page_title'] = 'About';
            $this->view("About", $data);//caling function from line 11, in the brackets goes name of view file
        }
   
}