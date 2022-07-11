<?php include("connectionBDD.php");
                $com="select * from allergie ";
                $exec=mysqli_query($connect,$com);

                while($res=mysqli_fetch_array($exec))
                {

                     $ss=mysqli_query($connect,"select * from client join etreallergique using(idClient)
                                join allergie using(idAllergie) where idClient='$idC' ");
                          
                     echo("<input type='checkbox' name=".$res['nomAllergie']." ");            

                    while($reds=mysqli_fetch_array($ss))
                    { 
                        $zz=$reds['idAllergie'];
                        if($res['nomAllergie']==$reds['nomAllergie'])
                        {
                            echo("checked");
                            if(isset($_POST['submit']) )
                            {
                                $req=mysqli_query($connect,"delete from etreallergique where idClient='$idC' and idAllergie='$zz'");
                            }
                        }
                        
                       
                       

                       
                    }echo(">");echo("<span>".$res['nomAllergie']."</span><br>");

                    if(isset($_POST['submit']) )   
                    {
                        if(isset($_POST[$res['nomAllergie']]) )
                        {
                           
                                $idA=$res['idAllergie'];
                              
                                $run=mysqli_query($connect,"insert into etreallergique values('$idC','$idA')");
            
                            
                        }

                    
                   }  

                  
                } 
             ?>

