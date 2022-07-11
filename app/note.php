<?php 

if(isset($_POST["submi"]))
{
    include("connectionBDD.php") ;
    $note=$_POST["note"]; 
    if($note>20 || $note<0){echo("Saisissez une note entre 0 et 20");}
    else
    {
        $req="insert into notes values(NULL ,'$note')";
        $exec=mysqli_query($connect,$req) ; 
    }

}
?>
