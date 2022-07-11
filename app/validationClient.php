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
     $nomC=$reds['nomC']." ".$reds["prenomC"] ; 
     echo("<span style=\"margin-left:35%;font-weight:bold;font-size:24px\">
          <img src=\"imm.png\" width=\"50px\" height=\"40px\" >
             $nomC </span>");echo("<br>");
         
         echo("<form method='post' >
        <input type='submit' value='Se deconnecter' name='submi'  
        style=\";height:29px;width:160px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;text-align:center;margin-left:52%;
        font-size:18px;\" href='Deconnexion.php'>  </form>
           ");
           if(isset($_POST['submi'])){include("Deconnexion.php");}

           ?></div> 
     
</div>

<?php include("menuClient.php");$idCom=$_GET['idCom']; ?> 





<div style="display: grid; grid-template-columns: 1fr 2fr 1fr ; grid-auto-rows: 440px;">

 <div ></div>

 <div id="MessPharm" style="overflow-x: hidden; overflow-y: auto;text-align:center;width:600px
                           ;color:#003d72;font-size:22px;font-weight:bold;background-color:#e9f5ff">
 
         
 <?php 

    
    $idC=$_SESSION['idC'];

    $req=mysqli_query($connect,"select * from commande join ordonnance using(idOrdonnance) 
                                   where idCommande = '$idCom' ");
    $res=mysqli_fetch_array($req);
    $idO=$res['idOrdonnance'];
    $idP=$res['idPharmacie'];
    $req1=mysqli_query($connect,"select * from medicamentsChoisis join medicaments using(idMedicament) where idOrdonnance='$idO' ");
    echo("<form method='post'>");
    $j=0;
    while($res1=mysqli_fetch_array($req1))
    {
        $photoMed=$res1['photoM'];
        $nomMed=$res1['nomM'];
        $idMed=$res1['idMedicament'];
        $quanPhar=$res1['quantiteChoisi'];
        echo("<img src=$photoMed height='270px' width='550px' >  <br>");
        echo("$nomMed");
        echo("&nbsp;<select name=\"quan$j\" >"); 
        $i=1;
        while($i<60)
        {
            if($i==$quanPhar){
               echo("<option value=$i selected >$i</option>");$i++;}
            else
            {
                echo("<option value=$i >$i</option>");$i++;
            }
        }
         
        echo("</select> <br><br>");
        if(isset($_POST['submit']))
         {
            $quan=$_POST["quan$j"];
            if($quanPhar != $quan)
            {
                $exec5=mysqli_query($connect,"update medicamentschoisis set quantiteChoisi='$quan'
                                    where idMedicament='$idMed' and idOrdonnance='$idO' and idPharmacie='$idP' ");
            }
            
         }

        $j++;
    }
    if(isset($_POST['submit']))
    {
        $exec9=mysqli_query($connect,"update commandeencours set validationClient=1 where idCommande = '$idCom' ");
        header("location:paiement.php?idCom=$idCom");//ON DOIT DEFINIR ICI
    }
     
?>



 
  </div>

 
   
  
   <div >
   <input type="submit" value="Valider"  name="submit" style="height:52px;width:180px;
                                        background-color:teal;font-weight:bold;color:white;
                                         font-size:30px; margin-left:30%;margin-top:90%"
                                          onclick="return(alert('commande validee avec succes'))"
   > <br><br>

     &nbsp;&nbsp;&nbsp; Ceci va définitivement valider votre commande                                                                 

</form>
    </div>
   
   
 </div>



  

   
   
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
</html> <?php ob_end_flush(); ?>
