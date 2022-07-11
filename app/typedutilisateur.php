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
   <h1 style="text-align:center; font-weight:bold;color:white;font-size:40px">Qui suis je <span style=" font-weight:bold;color:black;font-size:45px">?</span></h1> <br>
  <form action="redirectsubscribe.php" method="post">
    <div id="formwho">
      <label for=""><h1 style="text-align:center; font-weight:bold;color:white;font-size:30px">Un client :</h1></label>
        <input type="radio" name="who"  value="client"> <br>

      <label for=""><h1 style="text-align:center; font-weight:bold;color:white;font-size:30px">Une pharmacie :</h1></label> 
         <input type="radio" name="who"  value="pharmacie"> <br>

      <label for=""><h1 style="text-align:center; font-weight:bold;color:white;font-size:30px">Un Livreur :</h1></label>
         <input type="radio" name="who" value="livreur"> 
    </div> <br><br><br><br>
    <input type="submit" value="Suivant" name="submit" id="suiv">
   </form>
  
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
</html>