<?php

//if nothing is provided this class will run and this method
class Home extends Controller //inheritance
{
    function index()
        {
            $db = new Database();
            $db->db_connect();
            $this->view("home");//caling function from line 11, in the brackets goes name of view file
        }
    
}