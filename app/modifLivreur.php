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

     $nomL=$reds['nomLivreur'];
     $pnomL=$reds["prenomLivreur"] ;
     $mdpL=$reds["mdpL"] ;
     $telL=$reds["telL"] ;
     $emailL=$reds["emailL"] ;
     
     
     

             

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

<div id="typeuser">
<div id="whosides"></div>

<div id="who">
  
  <div>
     
     <form method="post" style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
           CHANGER VOS INFORMATIONS
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
         <label> Nom  :</label> <br>
          <input type="text" name="nomLivreur" placeholder="Saisir nom Livreur" autofocus required value=<?=$nomL?> >
          <br> <br>

          <label> Prénom :</label> <br>
          <input type="text" name="prenomLivreur" placeholder="Saisir nom Livreur" autofocus required value=<?=$pnomL?>>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailL" placeholder="Saisir mail Livreur" autofocus required value=<?=$emailL?>>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telL" placeholder="Saisir numero de telephone" autofocus required value=<?=$telL?>>
          <br> <br>

          <label for="">Zones de livraison :</label> <br>
         <div  style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:250px">
            <?php 
                include("connectionBDD.php");
                $com="select * from zonelivraison ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))  
                {

                     $ss=mysqli_query($connect,"select * from livreur join affectationlivreur using(idLivreur)
                                join zonelivraison using(idZone) where idLivreur='$idL' ");
                          
                     echo("<input type='checkbox' name=".$res['villeL']." ");            

                    while($reds=mysqli_fetch_array($ss))
                    { 
                        $zz=$reds['idZone'];
                        if($res['villeL']==$reds['villeL'])
                        {
                            echo("checked");
                            if(isset($_POST['submit']) )
                            {
                                $req=mysqli_query($connect,"delete from affectationlivreur where idLivreur='$idL' and idZone='$zz'");
                            }
                        }
                        
                       
                       

                       
                    }echo(">");echo("<span>". $res['villeL']." </span><br>");

                    if(isset($_POST['submit']) )   
                    {
                        if(isset($_POST[$res['villeL']]) )
                        {
                           
                                $idZone=$res['idZone'];
                              
                                $run=mysqli_query($connect,"insert into affectationlivreur values('$idL','$idZone')");
            
                            
                        }

                    
                   }  

                  

                    
             }

             
            ?>
         </div> <br>

         

           
    <?php
     
        include("connectionBDD.php");
       if(isset($_POST['submit']))
       {
        
        $no=$_POST['nomLivreur'];
        $mail=$_POST['emailL'];
        $telL=$_POST['telL'];
        $prenomL=$_POST['prenomLivreur'];
        $mdpL= sha1($_POST['mdpL']) ;


          if($_POST['mdpL']==$_POST['mdp'])
        {
            $exe=mysqli_query($connect,"update livreur set nomLivreur='$no', prenomLivreur='$prenomL' ,
                                                       mdpL='$mdpL', telL='$telL', emailL='$mail'
                                                       where idLivreur='$idL'") ;
            //mettre le header ici 
            header("location:modifLivreur.php");
        }

       } ?>

          <br> <br>

          <label>NOUVEAU MOT DE PASSE :</label> <br> 
          <input type="password" placeholder="Votre mot de pass SVP "required name="mdpL" >
          <br> <br>

          <label>CONFIRMER :</label> <br>
          <input type="password" placeholder="retapez le mot de pass SVP" name="mdp" required  > 

          <?php
          if(isset($_POST['submit'])){
             if($_POST['mdpL']!=$_POST['mdp'])
             { 
                echo("<span style=\"color:red;font-weight:bold\">INCORRECT</span>");
             }
            } 
            ?>

          <br>


    </div>
<br><br>
         <input type="submit" value="Modifier"  name="submit" style="margin-right:40%;margin-left:20% ;height:40px;width:180px;
                                                                     background-color:#e9f5ff;font-wight:bold;color:green;
                                                                      font-size:30px;"> 
    
      
  </form>


  </div>

</div>

<div id="whosides"></div>
 </div>
 <div id="foot">
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