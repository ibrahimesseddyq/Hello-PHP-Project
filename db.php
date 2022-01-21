<?php
    try{
    $con=mysqli_connect("localhost","root","","hello");
    }catch(Exception $e){
        echo "you got an error " .$e;
    }

?>