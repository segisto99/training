<?php 
$connect= new mysqli("bd","project","project","project");

if($connect->connect_error)
{
    echo "Connection failed". $con->connect_error;
}
?> 