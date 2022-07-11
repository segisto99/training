<?php session_start(); ob_start();
if(!isset($_SESSION['idL']))
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
      $idL=$_SESSION['idL'];
     include("connectionBDD.php");
     $ss=mysqli_query($connect,"select * from livreur where idLivreur='$idL' ");
     $reds=mysqli_fetch_array($ss);
     $nomL=$reds['nomLivreur']." ".$reds["prenomLivreur"] ; 
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

<?php include("menuLivreur.php"); ?> 



<div style="display: grid; grid-template-columns: 2fr 6fr 2fr ; grid-auto-rows: 440px;">

 <div > </div>

 <div id="validationsLivreur" style="overflow-x: hidden; overflow-y: auto;text-align:justify;width:80%;background-color:#e9f5ff">
         
 <?php 

      
if($res!=0)
{
  while($ans=mysqli_fetch_array($req)) 
  {echo("<form method='post'>");
     
        echo("<div id=\"encours\" style=\"color:#003d72;font-size:18px;
        background-color:#5F9EA0;width:100%;height:100%\">");

     $idCom=$ans['idCommande'];

     $idLivson=$ans['idLivraison'];

     $idO=$ans['idOrdonnance'];

     $nomC=$ans['nomC']." ".$ans['prenomC'];
     $telC=$ans['telC'];                        //join medicamentschoisis using(idOrdonnance)join medicaments using(idMedicament)
     $adrC=$ans['adrC'];
     $mailC=$ans['emailC'];
     $villeC=$ans['villeC'];
     $dateL=$ans['dateL'];
     $heureL=$ans['heureL'];

     $idP=$ans['idPharmacie'];
     $nomP=$ans['nomP'];
     $telP=$ans['telP'];
     $adrP=$ans['adrP'];
     $mailP=$ans['emailP'];
     $villeP=$ans['villeP'];

     echo("<p style=\"font-size:26px;font-weight:bold;background-color:#E6E6FA;border:solid 3px teal;
      ;text-align:center;color:#000033\">Livraison numero $idLivson de la commande $idCom </p>  ");

     echo("<div id='bellevue' style='display: grid; width:100%;grid-template-columns:  1fr 1fr ; grid-auto-rows: 130px;'>");

     echo("<div id='infosClient' style='background-color:teal;color:white;margin-right:14%;'>");
     echo("<span style='font-weight:bold'>Informations du client</span> : ");
     echo("<br>Nom : $nomC  ");
     echo("<br>Numero : $telC ");
     echo("<br>Email: $mailC ");
     echo("<br>Adresse : $adrC ");
     echo("<br>Ville : $villeC a <span style='background-color:#17252A'> $dateL $heureL </span>");
     echo("</div>");

     echo("<div id='infosPharmacie' style='margin-left:22%;background-color:#17252A;color:white'>");
     echo("<span style='font-weight:bold;'>Informations de la pharmacie</span> : ");
     echo("<br>Nom : $nomP ");
     echo("<br>Numero : $telP ");
     echo("<br>Email : $mailP ");
     echo("<br>Adresse : $adrP ");
     echo("<br>Ville : $villeC ");
     echo("</div>");
    
     echo("</div>");


     echo("<br><div id='Medicamentsinfos' style='overflow-x: hidden; overflow-y: auto;height:130px;width:43%;margin-left:27%;
                                      ;color:#003d72;font-size:22px;text-align:center;font-weight:bold;background-color:#e9f5ff'>");
    
     $req1=mysqli_query($connect,"select * from medicamentsChoisis join medicaments using(idMedicament) where idOrdonnance='$idO' ");

    while($res1=mysqli_fetch_array($req1))
    {
        $photoMed=$res1['photoM'];
        $nomMed=$res1['nomM'];
        $idMed=$res1['idMedicament'];
        $quanPhar=$res1['quantiteChoisi'];
        echo("<img src=$photoMed height='100px' width='300px' >  <br>");
        echo("Nom médicament:$nomMed , quantité:$quanPhar");
    }   
    
    echo("</div>");
        echo("<br>
        <input type='submit' name=\"subm$idO\" value='Valider'  
        style=\";height:43px;width:200px;border:solid 3px #003d72;border-radius:10px;margin-left:35%;
        background-color:teal;font-weight:bold;color:white;
        font-size:30px;\"> 
         <p style='font-size:16px;text-align:center;color:white;font-weight:bold'>
         Bien noter  les informations de la  commande avant de valider </p>  ");

    
    
     echo("</div>");

     if(isset($_POST["subm$idO"]))
     {
        include("connectionBDD.php");
        $res=mysqli_query($connect,"delete from commandeencours where idCommande='$idCom' ");
        header("location:validationLivreur.php");
     }
     echo(" </form>"); 
   }
   
 }
 else
 {
        echo("<div id=\"encours\" style=\"color:#003d72;text-align:center;font-weight:bold;font-size:20px;
                   width:100%;height:50%\">");

        echo("<br>Aucune livraison pour le moment !");

        echo("</div> <br>");

 }


     
  //#2565AE
 
 ?>
</div>
   
  
   <div ></div>
   
   
 </div>



  <?php /* <input type=\"submit\" value="Envoyer"  name=\"submit\" style=\";height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;\">    */ ?>

   
   
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
</html><?php ob_end_flush(); ?>
