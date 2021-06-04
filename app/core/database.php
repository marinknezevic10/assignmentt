<?php

class database
{
    //connecting with database
    //using pdo in case we use different type of db it still connects
    public function db_connect()
    {
        try{

            $string = DB_TYPE . ":host=". DB_HOST .";dbname=" . DB_NAME . ";";
            return $db = new PDO($string, DB_USER, DB_PASS);
            
        }catch(PDOException $e){
            
            die($e->getMessage());
        }
    }

    //reads from database
    //data set to empty array in case if it wasnt supplied it doesnt throw an error
    public function read($query, $data = [])
    {
        $db = $this->db_connect();
        $stm = $db->prepare($query);

        if(count($data)==0)
        {
            $stm = $db->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check)
        {
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }else{

            return false;
        }
    }

    //writes to database
    public function write($query, $data = [])
    {
        $db = $this->db_connect();
        $stm = $db->prepare($query);

        if(count($data)==0)
        {
            $stm = $db->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $check = $stm->execute($data);
        }

        if($check)
        {
            return true;
        }else{

            return false;
        }
    }
}