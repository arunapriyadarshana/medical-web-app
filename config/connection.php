<?php 

// connect database
$conn = mysqli_connect('localhost', 'root', "Aruna1234", 'medicineweb'); // (host,username,password,)

// check connection
if (!$conn) {
    echo 'connection error :' . mysqli_connect_error();
}

?>