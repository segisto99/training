<?php session_start(); ob_start();
if(!isset($_SESSION['idP']))
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaLiv</title>
    <?php include("CSS.php"); ?>
</head>
<body>
<div id="str">
     <div style="margin-left:2%;margin-top:5%"><a href="#" onclick="history.go(-1);"><img src="retour.png" height="35px" width="36px"></a>
                              &nbsp; &nbsp; <a href="index.php"> <img src="maison.png" alt="" height="30px" width="31px"></a>
                 &nbsp;  &nbsp; <a href=<?php echo($_SERVER['PHP_SELF']) ?>> <img src="recharger.png" alt="" height="28px" width="31px"></a>
                                </div>
     <div ><a href="index.php" id="pp">PharmaLiv<img src="logo.png" height="59px" width="110px"></a></div>
     <div><?php include("montre.php");  
      $idP=$_SESSION['idP'];
     include("connectionBDD.php");
     $ss=mysqli_query($connect,"select * from pharmacie
                                where idPharmacie='$idP' ");
     $reds=mysqli_fetch_array($ss);
     $nomP=$reds['nomP']; 
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             $nomP </span>");echo("<br>");
         
         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='subm'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['subm'])){include("Deconnexion.php");}

     $nomgerantP=$reds['nomgerantP'];
     $telP=$reds["telP"] ;
     $emailP=$reds["emailP"] ; 
     $adrP=$reds["adrP"];
     $villeP=$reds['villeP'];
     $photoP=$reds['photoP'];
     

           ?></div> 
     
</div>

<?php include("menuPharmacie.php"); ?> 

<div id="typeuser">
<div id="whosides"></div>

<div id="who">
  
  <div>
     
  <form method="post" enctype='multipart/form-data' style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
           MODIFIEZ VOTRE COMPTE :
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
    <label> NOM PHARMACIE :</label> <br>
          <input type="text" name="nomP" placeholder="Saisir nom pharmacie" autofocus required value=<?=$nomP?>>
          <br> <br>

          <label> ADRESSE :</label> <br>
          <input type="text" name="adrP" placeholder="Saisir addresse" autofocus required value=<?=$adrP?>>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailP" placeholder="Saisir mail pharmacie" autofocus required value=<?=$emailP?>>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telP" placeholder="Saisir numero de telephone" autofocus required value=<?=$telP?>>
          <br> <br>

          <label> NOM DU GERANT :</label> <br>
          <input type="text" name="gerantP" placeholder="Saisir le nom du gérant" autofocus required value=<?=$nomgerantP?>>
          <br> <br> 

          <label for="">LOCALISATION:</label> <br>
          <div  style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:200px">
            <?php 
                include("connectionBDD.php");
                $com="select * from zonelivraison ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                echo("<input type='radio' name='chosen'  value=". $res['villeL']." required ");
                 if($villeP==$res['villeL']){echo("checked");} echo(">");
                echo("<span>". $res['villeL']." </span><br>");
                
                }

                if(isset($_POST['submit'])){
                   
                    if(isset($_POST['chosen']))
                    {
                        $villeP=$_POST['chosen'];
                       

                    } else{$villeP="";}
             }
                
            ?>
         </div> <br>
         <img src=<?=$photoP?> height="100px" width="270px">
         <br><label for="">CHANGER LA PHOTO DE LA PHARMACIE : </label> <br> 
        <input type='file' name='filename' size='50' style="width:290px;height:20px;font-size:15px;color:teal" required /> 
   <?php

      if(isset($_POST['submit']))
      {
       if ($_FILES)
       {
       $name = $_FILES['filename']['name'];
       move_uploaded_file($_FILES['filename']['tmp_name'], $name); 
        
       } 
      }
 
  ?>

           
 <?php
     
     include("connectionBDD.php");
    if(isset($_POST['submit']))
    {
     
        $no=$_POST['nomP'];
        $mail=$_POST['emailP'];
        $mdpP= sha1($_POST['mdpP']) ;
        $telP=$_POST['telP'];
        $gerantP=$_POST['gerantP'];
        $adrP=$_POST['adrP'];


       if($_POST['mdpP']==$_POST['mdp'])
     {
         $exe=mysqli_query($connect,"update pharmacie set nomP='$no', nomgerantP='$gerantP' , adrP='$adrP' ,
                                               emailP='$mail' , telP='$telP' , mdpP='$mdpP' , photoP='$name' , villeP='$villeP'
                                                where idPharmacie='$idP'") ;
         //mettre le header ici 
         header("location:modifPharmacie.php");
     }

    }

 ?>

<br> <br>

<label>NOUVEAU MOT DE PASSE :</label> <br> 
<input type="password" placeholder="Votre mot de pass SVP "required name="mdpP" >
<br> <br>

<label>CONFIRMER :</label> <br>
<input type="password" placeholder="retapez le mot de pass SVP" name="mdp" required  > 

<?php
if(isset($_POST['submit'])){
   if($_POST['mdpP']!=$_POST['mdp'])
   { 
      echo("<span style=\"color:red;font-weight:bold\">INCORRECT</span>");
   }
  } 
  ?>

<br>


</div>
<br><br>
<input type="submit" value="Modifier"  name="submit" style="margin-right:40%;margin-left:20% ;height:40px;width:180px;
                                                           background-color:#e9f5ff;font-wight:bold;color:green;
                                                            font-size:30px;"> 


</form>


</div>

</div>

<div id="whosides"></div>
</div>
<div id="foot">
<div> <br>
<form action="" method="post">
<label for=""> Notez nous :</label> <input type="text" name="note" id="no">/20
<input type="submit" value="Envoyer" name="submi"> 
</form>
<?php include("note.php"); ?>
</div>
<div></div>
<div></div>
</div>
</body>
</html> <?php ob_end_flush(); ?>
