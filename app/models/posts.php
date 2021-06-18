<?php

class Posts
{
    function get_all()
    {
        //inquiry for gathering images from db
        $query = "select * all from images order by id desc limit 12";

        //connecting to db
        $db = new Database();

        //reading the inquiry
        $data = $db->read($query);

        //if its an array return it if its not return false
        if(is_array($data))
        {
            return $data;
        }
            return false;
    }

}