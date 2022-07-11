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

 
 <div style="background-color:#2565AE;color:white;font-weight:bold ; font-size:28px;width:92%;overflow-x: hidden; overflow-y: auto;">


 <span style="background-color:#17252A"> Payez votre commande :
 
  <?php
   
    
        $somme=0;                            
        $idC=$_SESSION['idC'];

        $req=mysqli_query($connect,"select * from commande join ordonnance using(idOrdonnance)  join pharmacie using(idPharmacie)
                                       where idCommande = '$idCom' ");
        $res=mysqli_fetch_array($req);
        $num=$res['telP'];
        $idO=$res['idOrdonnance'];
        $req1=mysqli_query($connect,"select * from medicamentsChoisis join medicaments using(idMedicament) where idOrdonnance='$idO' ");
        $j=0;
        while($res1=mysqli_fetch_array($req1))
        {
            $quan=$res1["quantiteChoisi"];
            $prix=$res1['prixM'];
            $total=$quan * $prix ;
            $somme=$somme+$total ;
            
            $j++;
        }
        echo " Total = $somme FCFA";
?>
</span>

 <br><h2 style="color:white;background-color:teal;font-weight:bold;text-align:center">Par Carte de Débit/ ou de Crédit : </h2> 
<label for="">Numéro:</label>
 <input type="text" name="" placeholder="Entrez le numéro" id="" style="margin-left:3%"> <br>
 <label for="">Date :</label>
 <input type="date" name="" id="" style="width:175px;margin-left:8%">(expiration) <br>
 <label for="">Code :</label>
 <input type="password" name="" placeholder="Entrez le code de sécurité" id="" style="margin-left:7%"> <br>
 <input type="button" style="color:blue;margin-left:20%" value="PAYER" onclick="alert('PAIEMENT EFFECTUEE AVEC SUCCES') "> 

 <h2 style="color:white;background-color:teal;font-weight:bold;text-align:center">Par WARI ou ORANGE MONEY : </h2> 

 <span>Envoyez l'argent au : <?=$num?></span>
<p style="font-size:18px;color:brown">REMARQUE: Toute commande non payée sera annulée </p>
  <a  
        style=";height:63px;width:220px;border:solid 3px #003d72;border-radius:10px;
        background-color:teal;font-weight:bold;color:white;
        font-size:30px;margin-left:39%" href='receptionClient.php'> Retourner </a>

</form>

 
 </div>

 
   
  
   <div >
   
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
