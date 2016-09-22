<?php
    /**
     * Created by PhpStorm.
     * User: Nostalgie
     * Date: 21-Sep-16
     * Time: 9:01 PM
     */
    $servername = "localhost";
    $user = "root";
    $password = "alva";
    $dbname = "helphand";

    // Create connection
    $conn = new mysqli($servername, $user, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>