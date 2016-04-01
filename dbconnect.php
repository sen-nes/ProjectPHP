<?php
    function connect() {
        $dbname = "project_library";
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'Secret123';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        if($conn -> connect_error) {
            die('Could not connect: ' . $conn -> connect_error);
        }
        
        return $conn;
    }
    $conn = connect();
?>