<?php

class Posts
{
    function get_all()
    {
        //inquiry for gathering images from db
        $query = "select * from images order by id desc limit 12";

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

    function get_one($link)
    {
        //inquiry for gathering images from db
        $query = "select * from images where url_address = :link limit 1";
        $arr['link'] = $link;
        //connecting to db
        $db = new Database();

        //reading the inquiry
        $data = $db->read($query, $arr);

        //if its an array return it if its not return false
        if(is_array($data))
        {
            return $data[0];
        }
            return false;
    }

}