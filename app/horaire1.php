<?php
          echo("<select name=\"heuredebut1\" required>"); 
          $i=0;
          while($i<24)
          {
              echo("<option value=$i> $i </options>");
              $i++;
              
          }
          echo("</select> H ");

          echo("<select name=\"mindebut1\" required >"); 
          $i=0;
          while($i<60)
          {
              echo("<option value=$i> $i </options>");$i++;
          } 
          echo("</select>mn &nbsp; a &nbsp;");

          echo("<select name=\"heurefin1\" required >");
          
          $i=0;
          while($i<24)
          {
              echo("<option value=$i> $i </options>");$i++;
          } 
          echo("</select>H ");

         echo("<select name=\"minfin1\" required>");
          
          $i=0;
          while($i<60)
          {
              echo("<option value=$i> $i </options>");$i++;
          } 
          echo("</select>mn  <br>"); 
         
          if(isset($_POST['submit']))
          {
            include("connectionBDD.php");
            $idP=$_POST['idPharmacie'];
            $exec=mysqli_query($connect,"select * from pharmacie where idPharmacie = '$idP' ");
            
          }

          if(isset($_POST['submit'])&&(mysqli_num_rows($exec)<=0 && ($_POST['mdpP']==$_POST['mdp'])))
          {
              $exec=mysqli_query($connect,"select * from pharmacie where idPharmacie = '$idP' ");
        
              
              $hd1=$_POST['heuredebut1'];
              $hf1=$_POST['heurefin1'];
              $md1=$_POST['mindebut1'];
              $mf1=$_POST['minfin1'];
              $req="insert into horaire values(NULL,'$hd1 H- $md1 mn','$hf1 H- $mf1 mn')";
              $res=mysqli_query($connect,$req);

              $exec2="select max(idHoraire) from horaire;";
              $req2=mysqli_query($connect,$exec2);
              $res2=mysqli_fetch_array($req2);
              $idHoraire=$res2['max(idHoraire)'];

              $res3=mysqli_query($connect,"insert into ouvrable values('$idP','$idHoraire')");
              


          }
          
          ?>