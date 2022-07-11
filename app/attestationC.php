<?php session_start(); ob_start();
if(!isset($_SESSION['idC']))
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
      $idC=$_SESSION['idC'];
     include("connectionBDD.php");
     $ss=mysqli_query($connect,"select * from client where idClient='$idC' ");
     $reds=mysqli_fetch_array($ss);
     $attes=$reds['atestasmaladieC'];
     $nomL=$reds['nomC']." ".$reds["prenomC"] ; 
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             $nomL </span>");echo("<br>");
         
         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='submi'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['submi'])){include("Deconnexion.php");}

           ?></div> 
     
</div>

<?php include("menuClient.php"); ?> 

<form method='post'  enctype='multipart/form-data'>

<div style="display: grid; grid-template-columns: 1fr 2fr 1fr ; grid-auto-rows: 465px;">

   <div>  </div>

<div id="attes"style="text-align:center; width:96% ;background-color:#F0F8FF; font-weight:bold ; font-size:25px;color:black">

 <label for="">Ajouter ou mettez a jour Votre attestation d'assurance maladie </label>  <br>

          <div style="border:solid 20px teal"> <img src=<?php echo("$attes height='350px'")?>> </div>

    <input type='file' name='filename' size='50' style="width:400px;height:28px;font-size:18px;color:teal;" required />

    <input type="submit" value="Envoyer"  name="submit" style=" height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;"
                                                                      onclick="return(confirm('Voulez vous  vraiment continuer ')">

    <?php
      
      if(isset($_POST['submit']))
      {
       if ($_FILES)
       {
       $name = $_FILES['filename']['name'];
       move_uploaded_file($_FILES['filename']['tmp_name'], $name); 
       include("connectionBDD.php");
       $exec=mysqli_query($connect,"update client set atestasmaladieC='$name' where idClient='$idC'"); 
        
       }
       header("location:attestationC.php");
      }
 
  ?>

</div>
   
 <div>   </div>
      
 </div>

 
 <div id="foot" style="margin-top:1%">
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
</html><?php ob_end_flush(); ?>
