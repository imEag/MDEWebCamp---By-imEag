<?php 

    $conn= new mysqli('localhost', 'root', '010802', 'medwebcamp');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
        echo 'error';
    } 

?>