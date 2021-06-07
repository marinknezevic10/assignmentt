<?php

class About extends Controller
{
    function index()
        {
            $data['page_title'] = 'About';
            $this->view("template/about-us", $data);
        }
   
}