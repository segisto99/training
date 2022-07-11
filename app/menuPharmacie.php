<?php 
      include("connectionBDD.php");
      $idP=$_SESSION['idP'];
      $req=mysqli_query($connect,"select * from commandeencours join commande using(idCommande)
       where idPharmacie='$idP' and validationPharmacie = 0 ");
      $res=mysqli_num_rows($req);

      $quer=mysqli_query($connect,"select * from commande join commandeencours using(idCommande)
      join client using(idClient)
      where validationClient=1 and idPharmacie='$idP' and validationLivreur=0 ");
      $nums=mysqli_num_rows($quer);
      
      
 ?>


<ul id="menu" style="text-align:center"> 
     
      <a href="receptionpharmacie.php" id="m5"><li style="width:250px ;font-size:27px">Receptions (<span style="color:#303d72;"><?php echo("$res");?></span>)</li></a>
      <a href="Validations.php" id="m7"><li style="width:250px ;font-size:27px">Validations (<span style="color:#303d72;"><?php echo("$nums");?></span>)</li></a>
      <a href="ajoutMedicament.php" id="mc2"><li style="width:250px ;font-size:27px">Ajout médicaments</li></a>
      <a href="modifPharmacie.php" id="m02"><li style="width:250px ;font-size:27px">Paramètres</li></a>
     
    </ul> 