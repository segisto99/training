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
     <div><?php include("montre.php");  echo("<br>"); 
         
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



<div style="display: grid; grid-template-columns: 6fr 5fr 6fr ; grid-auto-rows: 440px;">

 <div > </div>

 <div id="validations" style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                              width:400px.color:#003d72;text-align:center;font-weight:bold;
                             font-size:20px;background-color:#b6ddff;width:100%;height:40%;">
         
 <?php 

    
    $idCom=$_GET['idCom'];
    $idP=$_SESSION['idP'];
    $req2=mysqli_query($connect,"select * from commande join commandeencours using(idCommande)
                             join client using(idClient) where idCommande='$idCom'");
    $res2=mysqli_fetch_array($req2);
    $villeC=$res2['villeC'];

    $req3=mysqli_query($connect,"select * from livreur join affectationlivreur using(idLivreur)
                             join zonelivraison using(idZone) where villeL='$villeC'");
    $nms=mysqli_num_rows($req3);
      
if($nms!=0)
{ echo("<form  method='post'> <br><select name='livreur' style='font-weight:bold
                              ;border:solid 3px #003d72;width:250px;height:33px;font-size:20px'>");
  while($res3=mysqli_fetch_array($req3)) 
  {
    

     $idL=$res3['idLivreur'];
     $nomL=$res3['nomLivreur']." ".$res3['prenomLivreur'];
    
     echo("<option value=$idL> $nomL </option>");
    
   } 

   echo(" </select> <br> <br>
   <input type='submit' value='Choisir' name='submit'
   style=\";height:53px;width:250px;border:solid 3px #003d72;border-radius:10px;
   background-color:teal;font-weight:bold;color:white;
   font-size:27px;\"> <br> Ceci va alerter le livreur
      ");

   echo("</form>");

 }
 else
 {

        echo("<br>Vous ne disposer d'aucun livreur dans la zone du client !");

 }


     
  //#2565AE
 
 ?>
</div>
   
  
   <div ></div>
   
   
 </div>



  <?php 
     
     if(isset($_POST['submit']))
     {
         $idL=$_POST['livreur'];
         
         $reqs=mysqli_query($connect,"update livraison set idLivreur='$idL' where idCommande='$idCom'");
         $rieqs=mysqli_query($connect,"update commandeencours set validationLivreur=1 where idCommande='$idCom' ");
         $rr=mysqli_query($connect,"select * from livreur where idLivreur='$idL'");
         $res=mysqli_fetch_array($rr);
         $emailL=$res['emailL'];

         include("smslivreur.php");
         

         //IL FAUT AUSSI LUI ENVOYER UN MESSAGE

         header("location:Validations.php");

     }
  
  ?>

   
   
  </form>
 

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
