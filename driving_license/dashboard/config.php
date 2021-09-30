<?php
$conn = mysqli_connect('localhost','root','','driving_license');
    if(!isset($conn)){
        echo "not connected";
        die; 
    }
?>