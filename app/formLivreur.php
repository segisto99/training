<form method="post" style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
           INSCRIVEZ VOUS
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
         <label> Nom  :</label> <br>
          <input type="text" name="nomLivreur" placeholder="Saisir nom Livreur" autofocus required>
          <br> <br>

          <label> Prénom :</label> <br>
          <input type="text" name="prenomLivreur" placeholder="Saisir nom Livreur" autofocus required>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailL" placeholder="Saisir mail Livreur" autofocus required>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telL" placeholder="Saisir numero de telephone" autofocus required>
          <br> <br>

          <label for="">Zones de livraison :</label> <br>
         <div  style="overflow-x: hidden; overflow-y: auto;text-align:justify;height:60px;width:250px">
            <?php 
                include("connectionBDD.php");
                $com="select * from zonelivraison ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                    echo("<input type='checkbox' name=".$res['villeL'].">");
                    echo("<span>". $res['villeL']." </span><br>");
                }

                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {
                    if(isset($_POST[$res['villeL']]))
                    {
                        $idL=$_POST['idLivreur'];
                        $idZ=$res['idZone'];
                        $req="insert into affectationLivreur values ('$idL','$idZ') ";
                        $exo=mysqli_query($connect,$req);

                    }
                }
            ?>
         </div> <br>

          <label> IDENTIFIANT : </label> <br>
          <input type="text" placeholder="Votre identifiant SVP"required name="idLivreur"> 

           
    <?php
     
        include("connectionBDD.php");
       if(isset($_POST['submit']))
       {
        $idL=$_POST['idLivreur'];
        $no=$_POST['nomLivreur'];
        $mail=$_POST['emailL'];
        $mdpL= sha1($_POST['mdpL']) ;
        $telL=$_POST['telL'];
        $prenomL=$_POST['prenomLivreur'];

        $exec=mysqli_query($connect,"select * from Livreur where idLivreur = '$idL' ");
        
        if(mysqli_num_rows($exec)>0){echo("<span style=\"color:red;font-weight:bold\">EXISTE DEJA</span>");} //ATOMICITE IDENTIFIANT

        elseif(mysqli_num_rows($exec)<=0 && ($_POST['mdpL']==$_POST['mdp']))
        {
            $exe=mysqli_query($connect,"insert into livreur values ('$idL','$no','$prenomL','$mdpL','$telL', '$mail') ") ;
            header("location:index.php");
        }

       } ?>

          <br> <br>

          <label>MOT DE PASSE :</label> <br> 
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
         <input type="submit" value="S'inscrire"  name="submit" style="margin-right:40%;margin-left:20% ;height:40px;width:180px;
                                                                     background-color:#e9f5ff;font-wight:bold;color:green;
                                                                      font-size:30px;"
                                                                      onclick="return(alert('Succes ! Maintenant Connectez vous'))"> 
        

   
    

    
      
  </form>