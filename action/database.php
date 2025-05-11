<?php
session_start();

class database{
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "oop_crud";

        $connect = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname
        );

        return $connect;
    }
}

class query extends database{
    // function for get data to the database 
    public function getdata($table , $feild){
        $sql = "SELECT $feild FROM $table";
        $result = $this->connect()->query($sql);
        return $result;
    }

    //function for insert data to the database table 
      public function insertData($table, $param)
    {
        $fields = array();
        $values = array();
        foreach ($param as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }

        $fields = implode(",", $fields);
        $values = implode("','", $values);
        $values = "'" . $values . "'";

        $sql = "INSERT INTO $table ($fields) 
            VALUES ($values)";

        $result = $this->connect()->query($sql);
        return $result;
    }

    // function for delete data from database table 
    public function deletedata($table , $feild , $id){
        $sql = "DELETE FROM $table WHERE $feild = $id ";
        $result = $this->connect()->query($sql);
        return $result;
    }

    # function for get a single data to the database table 
    public function getdatabyid($table , $feild , $wherefeild , $id){
        $sql = "SELECT $feild FROM $table WHERE $wherefeild = $id";
        
    }


}
?>