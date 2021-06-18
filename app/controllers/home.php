<?php

//if nothing is provided this class will run and this method
class Home extends Controller //inheritance
{
    function index()
        {
            $data['page_title'] = 'Home';

            //loading posts model on home page
            $posts = $this->loadModel("posts");

            //loading get_all function from posts class
            $result = $posts->get_all();

            $data['posts'] = $result;

            $this->view("template/index", $data);//in the brackets goes name of view file
        }
    
}