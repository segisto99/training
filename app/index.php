<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PharmaLiv</title>
    <?php include("CSS.php"); ?>
    <?php include("graph.php"); ?>
</head>
<body>
<div id="str">
     <div><span id="secon"><a href="typeconnexion.php" id="lsins">Se connecter <img src="secon.png" height="23px" width="40px"></a></span></div>
     <div id="pp"><a href="index.php" id="pp">PharmaLiv<img src="logo.png" height="59px" width="110px"></a></div>
     <div><span id="sins"><a href="typedutilisateur.php" id="lsins">S'inscrire <img src="sins.png" height="24px" width="40px"></a></span></div>
</div>
<div id="grid">
   
   <div id="g">
      <img name="orama" height="541px" width="890px">
      <?php include("imagesDefilants.php"); ?>
    </div>

    <div id="droite"> 
    <div id="dr"></div>
    
    <div style="text-align:center ; font-size:40px;font-weight:bold; border: solid 4px white; border-radius:100px ">Bienvenue à PharmLiv</div> 
    <p  style="font-size:19px ;font-weight:bold;">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cette plateforme est basée sur de puissantes ressources mathématiques  pour une meilleure 
    performance et une meilleure lisibilité .<br> &nbsp; Ce site vous facilite la vie en vous livrant vos medicaments jusqu'a vos &nbsp; portes !
     <br> &nbsp;&nbsp; Dans ce site vous pourrez choisir la pharmacie que vous voulez et gérez &nbsp; vos commandes comme jamais.
    Connectez-vous alors , si vous n'avez pas de &nbsp; compte qu'attendez vous pour vous insrire ?
    </p>
    </div>
   
 </div>
 <div id="foot">
      <div> <br>
      <form action="" method="post">
         <label for=""> Notez nous :</label> <input type="text" name="note" id="no">/20
         <input type="submit" value="Envoyer" name="submi"> 
         
      </form>
      <?php include("note.php"); ?>
      </div>
      <div style="text-align:center"><br>Vous etes administrateur ? <br> <a href="loginAdmin.php">Cliquez ici</a></div>
      <div></div>
 </div>
</body>
</html>