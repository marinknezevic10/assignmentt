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

            //loading image cropping class
            $image_class = $this->loadModel("image_class");

            //I want the class to create thumbnails and replace 
            //the link of actual image with a link of thumbnail
            //first thing i need to do is to know if posts are an array
            //foreach so i can go trough each and every post
            if(is_array($data['posts']))
            {
                foreach ($data['posts'] as $key => $value) {
                    # code...
                    $all = $data['posts'][$key]->image;
                    $all = $data['posts'][$key]->image = $image_class->get_thumbnail($all);
                }
            }


            $this->view("template/index", $data);//in the brackets goes name of view file
        }
    
}