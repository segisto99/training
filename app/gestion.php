<?php session_start(); ob_start();
if(!isset($_SESSION['idA']))
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
      $idA=$_SESSION['idA'];
     
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             Admin </span>");echo("<br>");
         
         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='submi'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['submi'])){include("Deconnexion.php");}

           ?></div> 
     
</div>

<?php include("menuAdmin.php"); ?> 

<form method='post'  enctype='multipart/form-data'>

<div style="display: grid; grid-template-columns: 1fr 6fr 6fr 1fr ; grid-auto-rows: 240px;">
   <div style="font-size:20px ; color:#008080;">   </div>

<div id="GesC"style="overflow-x: hidden; overflow-y: auto;text-align:center;
    ;background-color:#F0F8FF; ; font-size:18px;color:black">

         <span style="color:#2565AE ;font-weight:bold ;font-size:32px;background-color:white">Clients</span> <br>
         <?php 


      include("connectionBDD.php");
      $ex0=mysqli_query($connect,"select *  from client ");
      echo("<table border=1 align='center'>");
      echo("<tr style='color:white;background-color:#2565AE'><th>Identifiant</th><th>Prénom</th><th>Nom</th><th>Téléphone</th>
           <th>Modifier</th><th>Supprimer</th>");
      $stl=["style='color:white;background-color:#4682B4;'","style='color:white;background-color:#1E90FF;'",
            "style='color:white;background-color:#483D8B;'"];
 $i=0;
  while($re=mysqli_fetch_array($ex0))
 {
     $nomC=$re['nomC'];
     $prenomC=$re['prenomC'];
     $idC=$re['idClient'];
     $telC=$re['telC'];
    
     if($i<3)
     {
        echo("<tr $stl[$i]><td>$idC</td><td>$prenomC</td><td>$nomC</td><td>$telC</td>
            <td><a href=\"modifclientAdmin.php?id=$idC\">Modifier</a></td>
            <td><a href=\"supprimerUser.php?id=$idC&who=1\"
             onclick=\"return(confirm('Voulez vous continuer ?'))\" >Supprimer</a></td>
            </tr>");

        $i++;
     }
     else
     {
         $i=0;
         echo("<tr $stl[$i]><td>$idC</td><td>$prenomC</td><td>$nomC</td><td>$telC</td>
               <td><a href=\"modifclientAdmin.php?id=$idC\">Modifier</a></td><td>
               <a href=\"supprimerUser.php?id=$idC&who=1\"
                onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
               </tr>");

     }
     
 } //#2565AE
 echo("</table>");
 
 ?>
</div>
   
   <div style="background-color:#E6E6FA;color:white;font-weight:bold 
   ; overflow-x: hidden; overflow-y: auto;text-align:center;;font-size:18px"> 

   <span style="color:#2565AE ;font-weight:bold ;font-size:32px;background-color:white">Pharmacies</span> <br>
         <?php 


      include("connectionBDD.php");
      $ex0=mysqli_query($connect,"select *  from pharmacie ");
      echo("<table border=1 align='center'>");
      echo("<tr style='color:white;background-color:#2565AE'><th>Identifiant</th><th>Nom Gérant</th><th>Nom</th><th>Téléphone</th>
           <th>Modifier</th><th>Supprimer</th>");
      $stl=["style='color:white;background-color:#4682B4;'","style='color:white;background-color:#1E90FF;'",
            "style='color:white;background-color:#483D8B;'"];
 $i=0;
  while($re=mysqli_fetch_array($ex0))
 {
     $nomP=$re['nomP'];
     $nomgerantP=$re['nomgerantP'];
     $idP=$re['idPharmacie'];
     $telP=$re['telP'];
    
     if($i<3)
     {
        echo("<tr $stl[$i]><td>$idP</td><td>$nomP</td><td>$nomgerantP</td><td>$telP</td>
              <td><a href=\"modifPharmAdmin.php?id=$idP\">Modifier</a></td>
              <td><a href=\"supprimerUser.php?id=$idP&who=2\"
               onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
              </tr>");
        $i++;
     }
     else
     {
         $i=0;
         echo("<tr $stl[$i]><td>$idP</td><td>$nomP</td><td>$nomgerantP</td><td>$telP</td>
               <td><a href=\"modifPharmAdmin.php?id=$idP\">Modifier</a></td>
               <td><a href=\"supprimerUser.php?id=$idP&who=2\"
                onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
               </tr>");
     }
     
 } //#2565AE
 echo("</table>");
 
 ?>
          
   </div>
   <div></div>
   
   
 </div>

<div style="display: grid; grid-template-columns: 1fr 6fr 6fr 1fr ; grid-auto-rows: 240px;">
   
   <div></div>

   <div  style="background-color:#F5F5F5;color:white;font-weight:bold 
                 ; overflow-x: hidden; overflow-y: auto;text-align:center;;font-size:18px;margin-top:4%">
    
    <span style="color:#2565AE ;font-weight:bold ;font-size:32px;background-color:white">Livreurs</span> <br>
         <?php 


      include("connectionBDD.php");
      $ex0=mysqli_query($connect,"select *  from livreur ");
      echo("<table border=1 align='center'>");
      echo("<tr style='color:white;background-color:#2565AE'><th>Identifiant</th><th>Nom</th><th>Prénom</th>
                </th><th>Téléphone </th>
                <th>Modifier</th><th>Supprimer</th>");

      $stl=["style='color:white;background-color:#4682B4;'","style='color:white;background-color:#1E90FF;'",
            "style='color:white;background-color:#483D8B;'"];
 $i=0;
  while($re=mysqli_fetch_array($ex0))
 {
     $nomL=$re['nomLivreur'];
     $prenomLivreur=$re['prenomLivreur'];
     $idL=$re['idLivreur'];
     $telL=$re['telL'];
    
     if($i<3)
     {
        echo("<tr $stl[$i]><td>$idL</td><td>$nomL</td><td>$prenomLivreur</td><td>$telL</td>
        <td><a href=\"modiflivrAdmin.php?id=$idL\">Modifier</a></td>
        <td><a href=\"supprimerUser.php?id=$idL&who=3\"
         onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
        </tr>");
        $i++;
     }
     else
     {
         $i=0;
         echo("<tr $stl[$i]><td>$idL</td><td>$nomL</td><td>$prenomLivreur</td><td>$telL</td>
        <td><a href=\"modiflivrAdmin.php?id=$idL\">Modifier</a></td>
        <td><a href=\"supprimerUser.php?id=$idL&who=3\"
         onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
        </tr>");
     }
     
 } //#2565AE
 echo("</table>");
 
 ?>
   </div>
   <div style="background-color:#B0E0E6;color:white;font-weight:bold 
                 ; overflow-x: hidden; overflow-y: auto;text-align:center;;font-size:18px;margin-top:4%"> 
       <span style="color:#2565AE ;font-weight:bold ;font-size:32px;background-color:white">Médicaments</span>
        &nbsp;&nbsp;&nbsp;<a href='ajoutMedAdmin.php' style='background-color:black'>Ajouter</a> <br>
         <?php 


      include("connectionBDD.php");
      $ex0=mysqli_query($connect,"select *  from medicaments ");
      echo("<table border=1 align='center'>");
      echo("<tr style='color:white;background-color:#2565AE'><th>Identifiant</th><th>Nom</th><th>Prix</th><th>Quantité</th>
                <th>Modifier</th><th>Supprimer</th>");

      $stl=["style='color:white;background-color:#4682B4;'","style='color:white;background-color:#1E90FF;'",
            "style='color:white;background-color:#483D8B;'"];
 $i=0;
  while($re=mysqli_fetch_array($ex0))
 {
     $nomM=$re['nomM'];
     $prixM=$re['prixM'];
     $quan=$re['quantiteM'];
     $idM=$re['idMedicament'];
    
     if($i<3)
     {
        echo("<tr $stl[$i]><td>$idM</td><td>$nomM</td><td>$prixM</td><td>$quan</td>
        <td><a href='modifierMed.php?id=$idM'>Modifier</a></td>
        <td><a href=\"supprimerUser.php?id=$idM&who=4\"
             onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>
        </tr>");
        $i++;
     }
     else
     {
         $i=0;
         echo("<tr $stl[$i]><td>$idM</td><td>$nomM</td><td>$prixM</td><td>$quan</td>
        <td><a href='modifierMed.php?id=$idM'>Modifier</a></td>
        <td><a href=\"supprimerUser.php?id=$idM&who=4\"
             onclick=\"return(confirm('Voulez vous continuer ?'))\">Supprimer</a></td>   
        </tr>");
     }
     
 } //#2565AE
 echo("</table>");
 
 ?>
       
   </div>
   <div>


   </div>
   
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
</html> <?php ob_end_flush(); ?>
