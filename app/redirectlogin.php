<?php 
  
  if($_POST['who']=="client")
  {
      header("location:loginClient.php");
  }
  elseif(($_POST['who']=="pharmacie"))
  {
    header("location:loginPharmacy.php");
  }
  else
  {
    header("location:loginlivreur.php");
  }

?>