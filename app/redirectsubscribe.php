<?php 
  
  if($_POST['who']=="client")
  {
      header("location:subscribeClient.php");
  }
  elseif(($_POST['who']=="pharmacie"))
  {
    header("location:subscribePharmacy.php");
  }
  else
  {
    header("location:subscribelivreur.php");
  }

?>