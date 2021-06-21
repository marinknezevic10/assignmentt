<?php

class Posts
{
    function get_all()
    {
        //if the page number is given assign it if its not page number is 1
        //passing int so we get number regardless what user passes to database
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        //inquiry for gathering images from db
        $limit = 2;

        //tells database to give next posts
        $offset = ($page_number -1 ) * $limit;

        $query = "select * from images order by id desc limit $limit offset $offset";

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

    
    function get_user($userr)
    {
        //inquiry for gathering images from db
        $query = "select * from users where username = :userr limit 1";
        $arr['userr'] = $userr;
        //connecting to db
        $db = new Database();

        //reading the inquiry
        $data = $db->read($query, $arr);

        //if its an array return it if its not return false
        if(is_array($data))
        {
            return $data;
        }
            return false;
    }

}