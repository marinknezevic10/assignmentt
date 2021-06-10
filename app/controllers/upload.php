<?php


class Upload extends Controller
{
    function index()
        {

            header("Location:". ROOT . "upload/image");
                die;

        }
    
        function image()
        {

            $user = $this->loadModel("user");
            
            if(!$result = $user->check_login())
            {
                header("Location:". ROOT . "login");
                die;
            }
            
            $data['page_title'] = 'Upload';
            $this->view("template/upload", $data);
        }
}