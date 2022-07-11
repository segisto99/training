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
    <?php include("visualiserDonnees.php"); ?>
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

<div style="display: grid; grid-template-columns: 2fr 4fr 2fr 4fr ; grid-auto-rows: 240px;">


<div style="overflow-x: hidden; overflow-y: auto;margin-top:9%;background-color:black;;color:white;text-align:center ; font-size:22px;height:60%">
  
<span style="background-color:#00264d;font-weight:bold">Chiffres d'affaire</span> <br> 
    <table border="1" align="center">
       <tr> <th>Pharmacie</th> <th>Chiffres</th></tr>
        <?php 

          include("connectionBDD.php");
        
          $req=mysqli_query($connect," select  sum(quantiteChoisi*prixM) chiffres ,nomP from medicamentsChoisis 
                                       join medicaments using(idMedicament) join pharmacie using(idPharmacie) natural join commande
                                       WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                       group by idPharmacie
                                       order by chiffres desc");

          while($res=mysqli_fetch_array($req))
          {
              $nomP=$res['nomP'];
              $ch=$res['chiffres'];

              echo("<tr> <td style='background-color:teal'>$nomP</td> <td style='background-color:#004d66'>$ch fcfa</td> </tr>");

          }
          
        ?>

    </table>
</div>

<div id="chP"></div>
<div style="overflow-x: hidden; overflow-y: auto;margin-top:9%;background-color:black;color:white;text-align:center ;
           color:white; font-size:20px;height:60%">

   <span style="background-color:#00264d;color:white;font-weight:bold">Médicaments en chiffres</span> <br>
     <table border="1" align="center">
    
    <tr> <th style="color:white;">Médicament</th> <th>Chiffres</th></tr>
     <?php 

       include("connectionBDD.php");
     
       $chifmed=mysqli_query($connect," select nomM, sum(quantiteChoisi*prixM) total 
                                 from medicamentschoisis join medicaments using(idMedicament) join commande using(idOrdonnance)
                                 WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                 group by idMedicament
                                 order by total desc 
                                 ");

       while($res=mysqli_fetch_array($chifmed))
       {
           $nomM=$res['nomM'];
           $ch=$res['total'];

           echo("<tr> <td style='background-color:teal'>$nomM</td> <td style='background-color:#004d66'>$ch Fcfa</td> </tr>");

       }
       
     ?>

 </table>

</div>
<div id="chM"></div>
</div>




<div style="display: grid; grid-template-columns: 2fr 4fr 2fr 4fr ; grid-auto-rows: 240px;margin-top:4%">


<div style="overflow-x: hidden; overflow-y: auto;margin-top:9%;background-color:black;color:white;text-align:center ; font-size:22px;height:60%">
  
<span style="background-color:#00264d;font-weight:bold">Les villes les plus livrées</span> <br> 
    <table border="1" align="center">
       <tr> <th>Ville</th> <th>Livraisons</th></tr>
        <?php 

          include("connectionBDD.php");
        
          $demaville=mysqli_query($connect," select villeC, count(*) nombreL from livraison natural join client
                                            join commande using(idCommande)
                                            WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                           group by villeC
                                           order by nombreL desc 
                                             ");
          while($res=mysqli_fetch_array($demaville))
          {
              $villeC=$res['villeC'];
              $ch=$res['nombreL'];

              echo("<tr> <td style='background-color:teal'>$villeC</td> <td style='background-color:#004d66'>$ch</td> </tr>");

          }
          
        ?>

    </table>
</div>

<div id="chVL"></div>
<div style="overflow-x: hidden; overflow-y: auto;margin-top:9%;background-color:black;color:white;text-align:center ;
           color:white; font-size:20px;height:60%">

   <span style="background-color:#00264d;color:white;font-weight:bold">Demandes en médicaments</span> <br>
     <table border="1" align="center">
    
    <tr> <th style="color:white;">Médicament</th> <th>Demandes</th></tr>
     <?php 

       include("connectionBDD.php");
     
      $demamed=mysqli_query($connect," select sum(quantiteChoisi) demandes,nomM
                                  from medicamentschoisis join medicaments using(idMedicament) join commande using(idOrdonnance)
                                  WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                  group by idMedicament
                                  order by demandes desc 
                                  ");

       while($res=mysqli_fetch_array($demamed))
       {
           $nomM=$res['nomM'];
           $ch=$res['demandes'];

           echo("<tr> <td style='background-color:teal'>$nomM</td> <td style='background-color:#004d66'>$ch</td> </tr>");

       }
       
     ?>

 </table>

</div>
<div id="chMD"></div>
</div>






 
</body>
</html> <?php ob_end_flush(); ?>