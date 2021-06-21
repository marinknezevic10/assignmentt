<?php


class Single_post extends Controller //inheritance
{
    //link given a default value in case user didnt provide it
    function index($link='', $userr='')
        {
           
            
            if($link == '')
            {
                $data['page_title'] = 'Image not found';
                $this->view("template/not_found", $data);

            }else{

                $posts = $this->loadModel("posts");

                //loading get_one function from posts class
                $result = $posts->get_one($link);

                $data['posts'] = $result;

                $data['page_title'] = 'Single post';
                $this->view("template/single_post", $data);//in the brackets goes name of view file

            }
        }
    
}