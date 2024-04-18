<?php
   
    $conn = new mysqli('localhost', 'root', 'Google@2020', 'coaching_registration', 3308);

    // $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
?>