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

<?php include("menuPharmacie.php"); $idCom=$_GET['idCom'];?> 



<div style="display: grid; grid-template-columns: 1fr 2fr 2fr ; grid-auto-rows: 440px;">

 <div id="infoClient" style="font-size:19px;overflow-x: hidden; overflow-y: auto;text-align:justify">
    
    <?php 

        include("connectionBDD.php");
        $exec=mysqli_query($connect,"select * from commande natural join client where idCommande = '$idCom' ");
        $res=mysqli_fetch_array($exec);
        $idC=$res['idClient'];
        echo("<br><br><span style='font-weight:bold'>Nom et Prenom Client : </span> <br>".$res['nomC']." ".$res['prenomC']." <br><br>");
        echo("<span style='font-weight:bold'>Genre :</span> <br>".$res['genreC']."<br><br>");
        echo("<span style='font-weight:bold'>Statut maternelle :</span> <br>  ".$res['statutmaternelC']."<br><br>");

        $exec0=mysqli_query($connect,"select * from etreallergique natural join allergie where idClient = '$idC' ");
        
        echo("<span style='font-weight:bold'>Nom(s) Allergie(s) : </span> <br>");
        while($res0=mysqli_fetch_array($exec0))
        {
            echo(" ".$res0['nomAllergie'].",");
        }
        echo("<br><br>");

        $exec2=mysqli_query($connect,"select * from etreentraitement natural join traitement where idClient = '$idC' ");
        
        echo("<span style='font-weight:bold'>Nom(s) Traitement(s) : </span> <br>");
        while($res2=mysqli_fetch_array($exec2))
        {
            echo(" ".$res2['nomTraitement'].",");
        }
        //METTRE AUSSI ATTESTATION MALADIE UNE FOIS PAGE FAITE

           
     ?>

 
  </div>

 <div id="choixMedicaments" style="overflow-x: hidden; overflow-y: auto;text-align:center;background-color:#e9f5ff">
 
         
 <?php 

    
    $idP=$_SESSION['idP'];
    $req=mysqli_query($connect,"select * from commande join ordonnance using(idOrdonnance) where idCommande = '$idCom' ");
    $res=mysqli_fetch_array($req);
    $idO=$res['idOrdonnance'];

    $req7=mysqli_query($connect,"select * from  ordonnance  where idOrdonnance = '$idO' ");
    $res7=mysqli_fetch_array($req7);
    $photoOrd=$res7['photoOrdonnance'];



    $req1=mysqli_query($connect,"select * from medicaments ");
    echo("<form method='post'>");
    $j=0;
    while($res1=mysqli_fetch_array($req1))
    {
        $photoMed=$res1['photoM'];
        $nomMed=$res1['nomM'];
        $idMed=$res1['idMedicament'];
        echo("<img src=$photoMed height='250px' width='450px' >  <br>");
        echo("<input type='checkbox' name=\"nom$j\" value=$idMed> $nomMed");
        echo("<select name=\"quan$j\" >"); 
        $i=1;
        while($i<60)
        {
            echo("<option value=$i>$i</option>");$i++;
        } 
        echo("</select> <br><br>");
        if(isset($_POST['submit']))
         {
            if(isset($_POST["nom$j"]))
            {$idM=$_POST["nom$j"];
            
            $quan=$_POST["quan$j"];

            $exec5=mysqli_query($connect,"insert into medicamentschoisis values('$idP','$idM','$quan','$idO') "); }
            
         }

        $j++;
    }
    if(isset($_POST['submit']))
    {
        $exec9=mysqli_query($connect,"update commandeencours set validationPharmacie = 1 where idCommande = '$idCom' ");
        header("location:receptionpharmacie.php");
    }
?>





<?php 



ob_end_flush();

?>





    
      

 
 
 
</div>
   
  
   <div ><img src=<?=$photoOrd?> height='330px' width='560px' > <br>
   <input type="submit" value="Envoyer"  name="submit" style="height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px; margin-left:30%;"> <br><br>

     &nbsp;&nbsp;&nbsp;Ceci va envoyer les details de la commande au client, vous recevrez sa reponse dans "Validations" .                                                                 

</form>
    </div>
   
   
 </div>



  <?php /* <input type=\"submit\" value="Envoyer"  name=\"submit\" style=\";height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;\">    */ ?>

   
   
  </form>
 <?php /*
     
     if(isset($_POST['submit']))
     {
        $exec=mysqli_query($connect,"select max(idOrdonnance) from ordonnance");
        $resO=mysqli_fetch_array($exec);
        $idO=$resO['max(idOrdonnance)'];
        $idP=$_POST['chosen'];
        $dateC= date("Y-m-d H:i:s");
        $dateL= $_POST['date'];
        $heureL=$_POST['heure'];
        $minL=$_POST['min'];
        $exec1=mysqli_query($connect,"insert into commande values (NULL,'$idC','$idO','$idP','','','','$dateC')");

        $exec=mysqli_query($connect,"select max(idCommande) from commande");
        $resO=mysqli_fetch_array($exec);
        $idCom=$resO['max(idCommande)'];

        $exec2=mysqli_query($connect,"insert into livraison values (NULL,'$idP','','$idC','','$idCom','$dateL','$heureL : $minL')");
        $exec3=mysqli_query($connect,"insert into commandeencours values ('$idCom')");

     }
*/
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
</html>
