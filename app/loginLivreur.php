<?php session_start(); ob_start();?>
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
     <div><?php include("montre.php"); ?> </div>
     
</div>
<div id="typeuser">
<div id="whosides"></div>

<div id="who">
  
  <div>
  <form method="post"  style="margin-left:20%;margin-right:20%; margin-top:7%; color:white;text-align:center">
          <h1 style="font-weight:bold;font-size:35px;color:white ; text-align:center">
          <img src="secon.png" height="30px" width="45px"> &nbsp;
           CONNECTEZ VOUS 
          :</h1> <br>

          <div id="scrollform"  style="
                                 height:300px;width:550px ; background-color:#294257;
                                 font-weight:bold;font-size:24px; border:solid 5px teal;border-radius:100px
                                 ">
                                 <br> 
        <?php 

if(isset($_POST['submit']))
{
    include("connectionBDD.php");
    $id=$_POST['id'];
    $password=sha1($_POST['mdp']);
    $req="select * from livreur where idLivreur = '$id' and mdpL='$password'";
    $exec= mysqli_query($connect,$req);

    if(mysqli_num_rows($exec)==0)
    {echo("<span style=\"color:red;font-weight:bold ; font-size:20px;\">Identifiant ou Mot de passe Incorrect</span>");} 
    elseif(mysqli_num_rows($exec) ==1)
    {
      $_SESSION['idL']=$id ; 
    header("location:validationLivreur.php"); 
    } // ON DOIT REDIRIGER UNE PAGE CONNECTEE ICI
 }
        ?>
         <br> 
         <label for="">IDENTIFIANT :</label> <br> 
         <input type="text" name="id" placeholder="Saisir votre identifiant" style="height:27px;width:210px;font-weight:bold;font-size:19px" >
         <br><br>

         <label for="">MOT DE PASSE :</label> <br>
         <input type="password" name="mdp"  placeholder="Saisir le mot de passe" style="height:27px;width:210px;font-weight:bold;font-size:19px">
         <br> <br> 
         <input type="submit" value="Se connecter"  name="submit" style="margin-right:20%;margin-left:20% ;height:44px;width:230px;
                                                                     background-color:#e9f5ff;font-wight:bold;color:green;
                                                                      font-size:34px;"> 
         </div>
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