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
     $ss=mysqli_query($connect,"select * from pharmacie where idPharmacie='$idP' ");
     $reds=mysqli_fetch_array($ss);
     $nomL=$reds['nomP']; 
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

<?php include("menuPharmacie.php"); ?> 

<form method='post'  enctype='multipart/form-data'>

<div style="display: grid; grid-template-columns: 1fr 3fr 3fr 1fr ; grid-auto-rows: 240px;">

   <div style="font-size:20px ; color:#008080;font-weight:bold">  </div>

<div id="choixpharmGrid"style="text-align:center; width:96% ;background-color:#F0F8FF; font-weight:bold ; font-size:30px;color:#2565AE">
         
    <br> <label> Nom du Médicament : </label> <br> <br>
    <input style="width:270px;height:27px;font-size:18px;color:white;background-color:#1E90FF" type="text" name="nomM" 
           placeholder="Saisir le nom du produit" autofocus required>
    
</div>
   
   <div style="background-color:#2565AE;color:white;font-weight:bold ; font-size:28px;text-align:center"> 
   <br> <label> Prix du Médicament : </label> <br> <br>
    <input style="width:250px;height:25px;font-size:18px;" type="number" name="prixM" 
           placeholder="Saisir le prix du produit" autofocus required> en FCFA
          
   </div>
   <div></div>
   
   
 </div>

<div style="display: grid; grid-template-columns: 1fr 3fr 3fr 1fr ; grid-auto-rows: 240px;">
   
   <div></div>
   <div  style="background-color:#1E90FF;color:white;font-weight:bold ; font-size:28px;text-align:center">
    
    <br><label for="">Mettez une photo du médicament : </label> <br> <br> 
    <input type='file' name='filename' size='40' style="width:390px;height:25px;font-size:18px;color:teal" required /> <br> <br>
     
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
    </form>


   </div>
   <div style="background-color:#B0E0E6;color:#2565AE;font-weight:bold ; font-size:28px;text-align:center"> 

   <br> <label> Quantité du Médicament : </label> <br> <br>
    <input style="width:250px;height:25px;font-size:18px;" type="number" name="quantiteM" 
           placeholder="Saisir la quantite a ajouter" autofocus required>

   </div>
   <div>

   <input type="submit" value="Ajouter"  name="submit" style=" margin-top:190px;height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;"
                                                                      onclick="return(alert('Medicament ajouté avec succes'))">     

   </div>
   
 </div> </form>
 <?php 
     
     if(isset($_POST['submit']))
     {
       $nomM=$_POST['nomM'];
       $prixM=$_POST['prixM'];
       $quantiteM=$_POST['quantiteM'];

       include("connectionBDD.php");
       $req=mysqli_query($connect,"insert into medicaments values (NULL,'$nomM','$quantiteM','$prixM','$name')");
       header("location:ajoutMedicament.php");
     }

 ?>

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
</html> <?php ob_end_flush(); ?>
