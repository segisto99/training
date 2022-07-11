<?php session_start(); ob_start();
if(!isset($_SESSION['idP']))
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
      $idP=$_SESSION['idP'];
     include("connectionBDD.php");
     $ss=mysqli_query($connect,"select * from pharmacie where idPharmacie='$idP' ");
     $reds=mysqli_fetch_array($ss);
     $nomL=$reds['nomP']; 
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             $nomL </span>");echo("<br>");
         
         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='submi'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['submi'])){include("Deconnexion.php");}

           ?></div> 
     
</div>

<?php include("menuPharmacie.php"); ?> 



<div style="display: grid; grid-template-columns: 6fr 5fr 6fr ; grid-auto-rows: 440px;">

 <div > </div>

 <div id="choixpharmGrid" style="overflow-x: hidden; overflow-y: auto;text-align:justify;width:400px;background-color:#e9f5ff">
         
 <?php 

    
    include("connectionBDD.php");
    $idP=$_SESSION['idP'];
    $req=mysqli_query($connect,"select * from commandeencours join commande using(idCommande) 
                      join client using(idClient) where idPharmacie='$idP' ");
      

  while($res=mysqli_fetch_array($req))
 {
     if($res['validationPharmacie']==1)
     {
       echo("<div id=\"encours\" style=\"color:#003d72;text-align:center;font-weight:bold;font-size:20px;
            width:100%;height:130px\">");
     }
     else
     {
        echo("<div id=\"encours\" style=\"color:#003d72;text-align:center;font-weight:bold;font-size:20px;
        background-color:#b6ddff;width:100%;height:130px\">");
     }

     $idC=$res['idCommande'];
     $nomC=$res['nomC']." ".$res['prenomC'];
     $date=$res['dateCommande'];
     echo("<span style=\"font-size:26px;font-weight:bold \">COMMANDE NUMERO : $idC </span>  ");
     echo("<br>Date : $date ");
     echo("<br>De : $nomC  <br>");
     if($res['validationPharmacie']==0)
     {
        
        echo("
        <a  
        style=\";height:63px;width:220px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;
        font-size:30px;\" href='traiterComPhar.php?idCom=$idC'> Traiter </a>
           ");
     }
     else
     {
         echo("<span style='color:teal;font-weight:bold;font-size:30px;'>( En cours ) </span>");
     }
    
     echo("</div> <br>");


     
 } //#2565AE
 
 ?>
</div>
   
  
   <div ></div>
   
   
 </div>



  <?php /* <input type=\"submit\" value="Envoyer"  name=\"submit\" style=\";height:52px;width:180px;
                                                                     background-color:teal;font-weight:bold;color:white;
                                                                      font-size:30px;\">    */ ?>

   
   
  </form>
 

 <div id="foot" style="margin-top:1%">
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
</html><?php ob_end_flush(); ?>
