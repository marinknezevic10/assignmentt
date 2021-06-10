<?php


class Signup extends Controller
{
    function index()
        {
            $data['page_title'] = 'Signup';
            $this->view("template/signup", $data);
        }
    
}