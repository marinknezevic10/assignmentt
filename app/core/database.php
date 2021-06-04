<?php

class database
{
    //connecting with database
    //using pdo in case we use different type of db it still connects
    public function db_connect()
    {
        try{

            $string = "mysql:host=localhost;dbname=mydatabase;";
            $db = new PDO($string, 'root', '');
            show($db);
        }catch(PDOException $e){
            
            die($e->getMessage());
        }
    }

    //reads from database
    //data set to empty array in case if it wasnt supplied it doesnt throw an error
    public function read($query, $data = [])
    {

    }

    //writes to database
    public function write($query, $data = [])
    {

    }
}