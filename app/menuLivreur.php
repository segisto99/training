<?php 
      include("connectionBDD.php");
      $idL=$_SESSION['idL'];
      $req=mysqli_query($connect,"select * from commandeencours 
                                 join commande using(idCommande) 
                                 natural join livraison
                                 join client using(idClient)
                                 join pharmacie using(idPharmacie)
                                 where idLivreur='$idL' and 
                                 validationLivreur = 1 ");

      $res=mysqli_num_rows($req);
   
 ?>


<ul id="menu" style="text-align:center"> 
      
      <a href="validationLivreur.php" id="m100"><li>Receptions (<span style="color:#003d72;"><?php echo("$res");?></span>)</li></a>
      <a href="Livraison.php" id="m71"><li>Livraisons </li></a>
      <a href="modifLivreur.php" id="m20"><li>Paramètres</li></a>
     
    </ul> 