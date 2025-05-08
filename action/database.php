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
?>