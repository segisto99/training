<?php 
      include("connectionBDD.php");
      $idC=$_SESSION['idC'];
      $req=mysqli_query($connect,"select * from commandeencours join commande using(idCommande) 
                                  join pharmacie using(idPharmacie) join client using(idClient)
       where idClient='$idC' and validationPharmacie= 1 and validationClient=0 ");

      $res=mysqli_num_rows($req);
      
 ?>



<ul id="menu" style="text-align:center"> 
      
      <a href="ClientCommande.php" id="m2" ><li style="width:260px">Commander</li></a>
      <a href="receptionClient.php" id="m14"><li style="width:260px">Receptions(<span style="color:black;font-weight:bold"><?php echo("$res");?></span>)</li></a>
      <a href="attestationC.php" id="m12"><li style="width:260px">Attestation</li></a>
      <a href="modifClient.php" id="m152"><li style="width:260px">Paramètres</li></a>
     
    </ul> 

   