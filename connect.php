<?php
    $server_name = "localhost";
    $user_name = "root";
    $password = '';
    $database = "web_tech";

    $conn = mysqli_connect($server_name,$user_name,$password,$database);

    if($conn)
    {
        echo("Connection successful");
    }

?>