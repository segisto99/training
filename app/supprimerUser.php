<?php 

$id=$_GET['id'];

$who=$_GET['who'];//who=1 : client, who=2 : pharmacie , who=3 livreur , who=4 medicaments / on utilise soit switch soit des ifs

include("connectionBDD.php");

if($who==1)
{
   $req=mysqli_query($connect,"delete from client where idClient='$id'");
}

if($who==2)
{
    $req=mysqli_query($connect,"delete from pharmacie where idPharmacie='$id'");
}

if($who==3)
{
    $req=mysqli_query($connect,"delete from livreur where idlivreur='$id'");
}

if($who==4)
{
    $req=mysqli_query($connect,"delete from medicaments where idMedicament='$id'");
}

header("location:gestion.php");