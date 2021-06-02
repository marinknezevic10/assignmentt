<?php

class About extends Controller
{
    function index()
        {
            $this->view("about");//caling function from line 11, in the brackets goes name of view file
        }
   
}