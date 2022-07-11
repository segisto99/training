<?php
       $subject = "Livraison de la commande numero $idCom"; 
       
         $message = "Vous avez une nouvelle livraison a effectuer,
                    Veillez vous connecter pour plus d'informations 
                    : http://localhost/Project/index.php ";
         
         $envoi= mail ($emailL,$subject,$message);
         
         

         ?> 