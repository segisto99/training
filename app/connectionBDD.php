<?php 
$con= new mysqli("mysql_db","project","project","mysql") 

if($con)
{
    echo "Connected !!"
}
else
{
    echo "Erreur"
}
?> 