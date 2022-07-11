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

<div style="display: grid; grid-template-columns: 1fr 3fr 3fr 1fr ; grid-auto-rows: 240px;">
   <div style="font-size:20px ; color:#008080;font-weight:bold"> <br> Choisissez une <br> pharmacie : <br> (Faites défiler) </div>

<div id="choixpharmGrid"style="overflow-x: hidden; overflow-y: auto;text-align:center;
   width:96% ;background-color:#F0F8FF; font-weight:bold ; font-size:25px;color:black">
         
         <?php 


      include("connectionBDD.php");
      $idC=$_SESSION['idC'];
      $ex0=mysqli_query($connect,"select villeC  from client where idClient='$idC' ");
      $re=mysqli_fetch_array($ex0);
      $villeC=$re['villeC'];
      $req="select *  from pharmacie where villeP='$villeC'  " ;
      $exec=mysqli_query($connect,$req);

    if(mysqli_num_rows($exec)==0)
 {
        echo("<span style='color:red'>Il n'éxiste pas encore de pharmacie partenaire dans votre zone .<br> 
            Défilez pour retrouver retrouverez la liste de toutes les pharmacies partenaires avec leurs villes respectives !</span>");
        $reqdd="select *  from pharmacie  " ;
        $exoo=mysqli_query($connect,$reqdd);
        while($resb=mysqli_fetch_array($exoo))
     {
       $nomP=$resb['nomP'];
       $villeP=$resb['villeP'];
     echo("<img src=\"".$resb['photoP']."\" height='250px' width='450px' >  <br>");
     echo(" <input type=\"radio\" value=\"".$resb['idPharmacie']."\" name='chosen' required >&nbsp; $nomP &nbsp; , Ville: $villeP <br><br>");
     
    }


 }

  while($res=mysqli_fetch_array($exec))
 {
     $nomP=$res['nomP'];
     echo("<img src=\"".$res['photoP']."\" height='250px' width='450px' >  <br>");
     echo(" <input type=\"radio\" value=\"".$res['idPharmacie']."\" name='chosen' required >&nbsp; $nomP <br><br>");
     
 } //#2565AE
 
 ?>
</div>
   
   <div style="background-color:#2565AE;color:white;font-weight:bold ; font-size:28px;text-align:center"> 
  <br> <label> Choisissez une date <br> de livraison:</label> <br> <br>
          <input style="width:250px;height:25px;font-size:18px;" type="date" name="date"  autofocus required>
          
   </div>
   <div></div>
   
   
 </div>

<div style="display: grid; grid-template-columns: 1fr 3fr 3fr 1fr ; grid-auto-rows: 240px;">
   
   <div></div>
   <div  style="background-color:#1E90FF;color:white;font-weight:bold ; font-size:28px;text-align:center">
    
    <br><label for="">Deposer une photo de <br> votre ordonnance : </label> <br> <br> 
    <input type='file' name='filename' size='40' style="width:390px;height:25px;font-size:18px;color:teal" required /> <br> <br>
     
    <?php
      
     if(isset($_POST['submit']))
     {
      if ($_FILES)
      {
      $name = $_FILES['filename']['name'];
      move_uploaded_file($_FILES['filename']['tmp_name'], $name); 
      include("connectionBDD.php");
      $exec=mysqli_query($connect,"insert into ordonnance values(NULL,'$idC','$name')"); 
       
      }
     }

 ?>
    </form>


   </div>
   <div style="background-color:#B0E0E6;color:#2565AE;font-weight:bold ; font-size:28px;text-align:center"> <br>
      <label for="">Definissez l'heure <br> de votre livraison :</label> <br> <br>
       <?php 
          
          echo("<select name=\"heure\" required>"); 
          $i=0;
          while($i<24)
          {
              echo("<option value=$i> $i </options>");
              $i++;
              
          }
          echo("</select> h ");

          echo("<select name=\"min\" required >"); 
          $i=0;
          while($i<60)
          {
              echo("<option value=$i> $i </options>");$i++;
          } 
          echo("</select>mn");

       ?>
   </div>
   <div>

   <input type="submit" value="Envoyer"  name="submit" style=" margin-top:190px;height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;"
                                                                      onclick="return(alert('commande envoyee avec succes'))">     

   </div>
   
 </div> </form>
 <?php 
     
     if(isset($_POST['submit']))
     {
        $exec=mysqli_query($connect,"select max(idOrdonnance) from ordonnance");
        $resO=mysqli_fetch_array($exec);
        $idO=$resO['max(idOrdonnance)'];
        $idP=$_POST['chosen'];
        $dateC= gmdate("Y-m-d H:i:s");
        $dateL= $_POST['date'];
        $heureL=$_POST['heure'];
        $minL=$_POST['min'];
        $exec1=mysqli_query($connect,"insert into commande values (NULL,'$idC','$idO','$idP','$dateC')");

        $exec=mysqli_query($connect,"select max(idCommande) from commande");
        $resO=mysqli_fetch_array($exec);
        $idCom=$resO['max(idCommande)'];

        $exec2=mysqli_query($connect,"insert into livraison values (NULL,'$idP','$idC','','$idCom','$dateL','$heureL : $minL')");
        $exec3=mysqli_query($connect,"insert into commandeencours values ('$idCom','','','')");

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
