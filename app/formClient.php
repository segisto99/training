
<form method="post"  style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
           INSCRIVEZ VOUS
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
    <label> PRENOM :</label> <br>
          <input type="text" name="prenomC" placeholder="votre prénom" autofocus required>
          <br> <br>

          <label> NOM :</label> <br>
          <input type="text" name="nomC" placeholder="votre nom" autofocus required>
          <br> <br>

          <label> ADRESSE  :</label> <br>
          <input type="text" name="adrC" placeholder="Saisir addresse" autofocus required>
          <br> <br>

          <label> DATE DE NAISSANCE :</label> <br>
          <input type="date" name="datenaissC" placeholder="votre nom " autofocus required>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailC" placeholder="votre mail SVP" autofocus required>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telC" placeholder="Saisir numero de telephone" autofocus required>
          <br> <br>

          <label> GENRE :</label> <br>
         <input type="radio" name="genreC"  value="M" autofocus required> M
          <br>
           <input type="radio" name="genreC"  value="F" autofocus required> F
          <br> <br>

          <label for="">TRAITEMENTS EN COURS :</label> <br>
         <div id="traitement" style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:200px ">
            <?php 
                include("connectionBDD.php");
                $com="select * from traitement ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                    echo("<input type='checkbox' name=".$res['nomTraitement'].">" );
                    echo("<span>".$res["nomTraitement"]."</span><br>");
                    
                }

                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                    if(isset($_POST[$res['nomTraitement']]))
                    {
                        $idC=$_POST['idClient'];
                        $idT=$res['idTraitement'];
                        $req="insert into etreentraitement values ('$idT','$idC') ";
                        $exo=mysqli_query($connect,$req);

                    }
                }
            ?>
         </div> <br> <br>

         <label for="">ALLERGIES :</label> <br>
         <div id="allergies" style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:250px">
            <?php 
                include("connectionBDD.php");
                $com="select * from allergie ";
                $exec=mysqli_query($connect,$com);$i=0;
                $arrow=[];
                while($res=mysqli_fetch_array($exec))
                {
                    $nom=$res['nomAllergie'];
                    $idA=$res['idAllergie'];
                    echo("<input type='checkbox' name=\"choisi$i\"  >");
                    echo("<span>$nom </span><br>");
                    
                    if(isset($_POST["choisi$i"]))
                    {
                        $idC=$_POST['idClient'];
                       $ex=mysqli_query($connect,"insert into etreallergique values('$idA','$idC')");

                    }$i++;
                } ?>

             
         </div> <br>

         <label> STATUT MATRIMORNIALE : </label> <br> 
         <input type="radio" name="statut"value="Allaitante" required>  Allaitante 
          <br> 
          <input type="radio" name="statut" value="Enceinte" required> Enceinte 
          <br> 
           <input type="radio" name="statut" value=" Aucune" required> Aucune
          <br> <br>

          <label for="">LOCALISATION:</label> <br>
          <div  style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:250px">
            <?php 
                include("connectionBDD.php");
                $com="select * from zonelivraison ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                    echo("<input type='radio' name='chosen' value=". $res['villeL'].">");
                    echo("<span>". $res['villeL']." </span><br>");
                
                }

                if(isset($_POST['submit'])){
                   
                    if(isset($_POST['chosen']))
                    {
                        $villeC=$_POST['chosen'];
                       

                    } else{$villeC="";}
             }
                
            ?>
         </div> <br>


          <label> IDENTIFIANT : </label> <br>
          <input type="text" placeholder="Votre identifiant SVP"required name="idClient"> 

           
    <?php 
     
        include("connectionBDD.php");
       if(isset($_POST['submit']))
       {
        $idC=$_POST['idClient'];
        $pr=$_POST['prenomC'];
        $no=$_POST['nomC'];
        $mail=$_POST['emailC'];
        $da=$_POST['datenaissC'];
        $genre=$_POST['genreC'];
        $statut=$_POST['statut'];
        $mdpC= sha1($_POST['mdpC']) ;
        $telC=$_POST['telC'];
        $adrC=$_POST['adrC'];

        $exec=mysqli_query($connect,"select * from client where idClient = '$idC' ");
        
        if(mysqli_num_rows($exec)>0){echo("<span style=\"color:red;font-weight:bold\">EXISTE DEJA</span>");} //ATOMICITE IDENTIFIANT

        elseif(mysqli_num_rows($exec)<=0 && ($_POST['mdpC']==$_POST['mdc']))
        {
            $exe=mysqli_query($connect,"insert into client values ('$idC','$no','$pr','$telC',
            '$mail','$da','$genre','$statut','$mdpC','attestation.png','$adrC','$villeC') ") ;
             header("location:index.php");
        }

       } ?>

          <br> <br>

          <label>MOT DE PASSE :</label> <br> 
          <input type="password" placeholder="Votre mot de pass SVP "required name="mdpC" >
          <br> <br>

          <label>CONFIRMER :</label> <br>
          <input type="password" placeholder="retapez le mot de pass SVP" name="mdc" required  > 

          <?php
          if(isset($_POST['submit'])){
             if($_POST['mdpC']!=$_POST['mdc'])
             { 
                 echo("<span style=\"color:red;font-weight:bold\">INCORRECT</span>");
             }
            } 
            ?>

          <br> <br>


    </div>
<br><br>
         <input type="submit" value="S'inscrire"  name="submit" style="margin-right:40%;margin-left:20% ;height:40px;width:180px;
                                                                     background-color:#e9f5ff;font-wight:bold;color:green;
                                                                      font-size:30px;" 
                                                                      onclick="return(alert('Succes ! Maintenant Connectez vous'))"> 
        

   
    

    
      
  </form>