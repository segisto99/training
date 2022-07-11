<?php session_start(); ob_start();
if(!isset($_SESSION['idC']))
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
      $idC=$_SESSION['idC'];
     include("connectionBDD.php");
     $ss=mysqli_query($connect,"select * from client where idClient='$idC' ");
     $reds=mysqli_fetch_array($ss);
     $nomL=$reds['nomC']." ".$reds["prenomC"] ; 
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             $nomL </span>");echo("<br>");

     $nomC=$reds['nomC'];
     $pnomC=$reds["prenomC"] ;
     $mdpC=$reds["mdpC"] ;
     $telC=$reds["telC"] ;
     $emailC=$reds["emailC"] ; 
     $genre=$reds["genreC"];
     $statut=$reds["statutmaternelC"];
     $adrC=$reds["adrC"];
     $da=$reds["datenaissC"];
     $villeC=$reds['villeC'];


         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='submi'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['submi'])){include("Deconnexion.php");}

           ?></div> 
     
</div>

<?php include("menuClient.php"); ?> 

<div id="typeuser">
<div id="whosides"></div>

<div id="who">
  
  <div>
     
  <form method="post"  style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
          CHANGER VOS INFORMATIONS
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
    <label> PRENOM :</label> <br>
          <input type="text" name="prenomC" placeholder="votre prénom" autofocus required value=<?=$pnomC?>>
          <br> <br>

          <label> NOM :</label> <br>
          <input type="text" name="nomC" placeholder="votre nom" autofocus required value=<?=$nomL?>>
          <br> <br>

          <label> ADRESSE  :</label> <br>
          <input type="text" name="adrC" placeholder="Saisir addresse" autofocus required value=<?=$adrC?>>
          <br> <br>

          <label> DATE DE NAISSANCE :</label> <br>
          <input type="date" name="datenaissC" placeholder="votre nom " autofocus required value=<?=$da?>>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailC" placeholder="votre mail SVP" autofocus required value=<?=$emailC?>>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telC" placeholder="Saisir numero de telephone" autofocus required value=<?=$telC?>>
          <br> <br>

          <label> GENRE :</label> <br>
         <input type="radio" name="genreC"  value="M" autofocus required <?php if($genre=='M'){echo("checked");} ?>> M
          <br>
           <input type="radio" name="genreC"  value="F" autofocus required <?php if($genre=='F'){echo("checked");} ?>> F
          <br> <br>

          

          <label for="">TRAITEMENTS EN COURS :</label> <br>
         <div id="traitement" style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:200px ">
            <?php 
                
                $com="select * from traitement ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec)) 
                {

                     $ss=mysqli_query($connect,"select * from client join etreentraitement using(idClient)
                                join traitement using(idTraitement) where idClient='$idC' ");
                          
                     echo("<input type='checkbox' name=".$res['nomTraitement']." ");            

                    while($reds=mysqli_fetch_array($ss))
                    { 
                        $zz=$reds['idTraitement'];
                        if($res['nomTraitement']==$reds['nomTraitement'])
                        {
                            echo("checked");
                            if(isset($_POST['submit']) )
                            {
                                $req=mysqli_query($connect,"delete from etreentraitement where idClient='$idC' and idTraitement='$zz'");
                            }
                        }
                        
                       
                       

                       
                    }echo(">");echo("<span>".$res['nomTraitement']."</span><br>");

                    if(isset($_POST['submit']) )   
                    {
                        if(isset($_POST[$res['nomTraitement']]) )
                        {
                           
                                $idT=$res['idTraitement'];
                              
                                $run=mysqli_query($connect,"insert into etreentraitement values('$idT','$idC')");
            
                            
                        }

                    
                   }  

                  
                } 
            ?>
         </div> <br> <br>

        

         <label> STATUT MATRIMORNIALE : </label> <br> 
         <input type="radio" name="statut" value="Allaitante" required <?php if($statut='Allaitante'){echo("checked");} ?>>  Allaitante 
          <br> 
          <input type="radio" name="statut" value="Enceinte" required <?php if($genre='Enceinte'){echo("checked");} ?>> Enceinte 
          <br> 
           <input type="radio" name="statut" value="Aucune" required <?php if($genre='Aucune'){echo("checked");} ?>> Aucune
          <br> <br>

          <label for="">LOCALISATION:</label> <br>
          <div  style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:200px">
            <?php 
                include("connectionBDD.php");
                $com="select * from zonelivraison ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                echo("<input type='radio' name='chosen'  value=". $res['villeL']." required ");
                 if($villeC==$res['villeL']){echo("checked");} echo(">");
                echo("<span>". $res['villeL']." </span><br>");
                
                }

                if(isset($_POST['submit'])){
                   
                    if(isset($_POST['chosen']))
                    {
                        $villeC=$_POST['chosen'];
                       

                    } else{$villeC="";}
             }
                
            ?>
         </div> 



           
    <?php 
     
        
       if(isset($_POST['submit']))
       {
        $pr=$_POST['prenomC'];
        $no=$_POST['nomC'];
        $mail=$_POST['emailC'];
        $da=$_POST['datenaissC'];
        $genre=$_POST['genreC'];
        $statut=$_POST['statut'];
        $mdpC= sha1($_POST['mdpC']) ;
        $telC=$_POST['telC'];
        $adrC=$_POST['adrC'];


        if($_POST['mdpC']==$_POST['mdp'])
      {
          $exe=mysqli_query($connect,"update client set nomC='$no' , prenomC='$pr' , telC='$telC' , emailC='$mail' , datenaissC='$da',
                                      genreC='$genre' , statutmaternelC='$statut' , mdpC='$mdpC' , adrC='$adrC' , villeC='$villeC'
                                                     where idClient='$idC'") ;
          //mettre le header ici 
          header("location:modifClient.php");
      }

     } ?>

        <br> 

        <label>NOUVEAU MOT DE PASSE :</label> <br> 
        <input type="password" placeholder="Votre mot de pass SVP "required name="mdpC" >
        <br> <br>

        <label>CONFIRMER :</label> <br>
        <input type="password" placeholder="retapez le mot de pass SVP" name="mdp" required  > 

        <?php
        if(isset($_POST['submit'])){
           if($_POST['mdpC']!=$_POST['mdp'])
           { 
              echo("<span style=\"color:red;font-weight:bold\">INCORRECT</span>");
           }
          } 
          ?>

        <br> <br>


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