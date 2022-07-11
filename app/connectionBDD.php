<?php 
$connect= new mysqli("project","project","project","project");

if($connect->connect_error)
{
    echo "Connection failed". $con->connect_error;
}
?> 