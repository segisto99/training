<?php session_start();  ob_start();
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



<div style="display: grid; grid-template-columns: 6fr 5fr 6fr ; grid-auto-rows: 440px;">

 <div > </div>

 <div id="MessPharm" style="overflow-x: hidden; overflow-y: auto;text-align:justify;width:400px;background-color:#e9f5ff">
         
 <?php 

    
    include("connectionBDD.php");
    $idC=$_SESSION['idC'];
      
if($res!=0)
{
  while($res1=mysqli_fetch_array($req))
  {
     
        echo("<div id=\"encours\" style=\"color:#003d72;text-align:center;font-weight:bold;font-size:20px;
        background-color:#b6ddff;width:100%;height:130px\">");

     $idCom=$res1['idCommande'];
     $nomP=$res1['nomP'];
     $date=$res1['dateCommande'];
     echo("<span style=\"font-size:26px;font-weight:bold \">COMMANDE NUMERO : $idCom </span>  ");
     echo("<br>Date : $date ");
     echo("<br>De : $nomP  <br>");
    
        echo("
        <a  
        style=\";height:63px;width:220px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;
        font-size:30px;\" href='validationClient.php?idCom=$idCom'> Finaliser </a>
           ");
    
     echo("</div> <br>");
   } 
 }
 else
 {
        echo("<div id=\"encours\" style=\"color:#003d72;text-align:center;font-weight:bold;font-size:20px;
                   width:100%;height:50%\">");

        echo("<br>Vous n'avez aucune reception pour le moment");

        echo("</div> <br>");

 }


     
  //#2565AE
 
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
