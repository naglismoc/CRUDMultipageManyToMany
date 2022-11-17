<?php

class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "rudeneliai_recipes";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }



}


?>