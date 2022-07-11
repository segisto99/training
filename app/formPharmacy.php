<form method="post" style="margin-left:30%;margin-right:30%; margin-top:5%; color:white">
          <h1 style="font-weight:bold;font-size:25px;color:white ; text-align:center">
          <img src="secon.png" height="25px" width="45px"> &nbsp;
           INSCRIVEZ VOUS
          :</h1>  
      
    <div id="scrollform"  style="overflow-x: hidden; overflow-y: auto;text-align:justify;
                                 height:300px;width:350px ; background-color:#294257;
                                 font-weight:bold">
                                 <br>
    <label> NOM PHARMACIE :</label> <br>
          <input type="text" name="nomP" placeholder="Saisir nom pharmacie" autofocus required>
          <br> <br>

          <label> ADRESSE :</label> <br>
          <input type="text" name="adrP" placeholder="Saisir addresse" autofocus required>
          <br> <br>

          <label> EMAIL :</label> <br>
          <input type="text" name="emailP" placeholder="Saisir mail pharmacie" autofocus required>
          <br> <br>

          <label> NUMERO DE TELEPHONE :</label> <br>
          <input type="text" name="telP" placeholder="Saisir numero de telephone" autofocus required>
          <br> <br>

          <label> NOM DU GERANT :</label> <br>
          <input type="text" name="gerantP" placeholder="Saisir le nom du gérant" autofocus required>
          <br> <br> 

          <label> HORAIRES D'OUVERTURES (Remplir les 2)  :</label> <br>

          <?php include("horaire1.php"); ?>
          
          <?php include("horaire2.php"); ?>
          <br> 

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
                            $villeP=$_POST['chosen'];
                           
    
                        } else{$villeP="";}
                 }
                
               
                
            ?>
         </div> <br>

          <label> IDENTIFIANT : </label> <br>
          <input type="text" placeholder="Votre identifiant SVP"required name="idPharmacie"> 

           
    <?php
     
        include("connectionBDD.php");
       if(isset($_POST['submit']))
       {
        $idP=$_POST['idPharmacie'];
        $no=$_POST['nomP'];
        $mail=$_POST['emailP'];
        $mdpP= sha1($_POST['mdpP']) ;
        $telP=$_POST['telP'];
        $gerantP=$_POST['gerantP'];
        $adrP=$_POST['adrP'];
        

        $exec=mysqli_query($connect,"select * from pharmacie where idPharmacie = '$idP' ");
        
        if(mysqli_num_rows($exec)>0){echo("<span style=\"color:red;font-weight:bold\">EXISTE DEJA</span>");} //ATOMICITE IDENTIFIANT

        elseif(mysqli_num_rows($exec)<=0 && ($_POST['mdpP']==$_POST['mdp']))
        {
            $exe=mysqli_query($connect,"insert into pharmacie values ('$idP','$no','$gerantP','$adrP', '$mail','$telP',
           '$mdpP','noimage.jpg','$villeP') ") ;
            header("location:index.php");
        }

       } ?>

          <br> <br>

          <label>MOT DE PASSE :</label> <br> 
          <input type="password" placeholder="Votre mot de pass SVP "required name="mdpP" >
          <br> <br>

          <label>CONFIRMER :</label> <br>
          <input type="password" placeholder="retapez le mot de pass SVP" name="mdp" required  > 

          <?php
          if(isset($_POST['submit'])){
             if($_POST['mdpP']!=$_POST['mdp'])
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