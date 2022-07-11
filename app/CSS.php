<style>
#secon{font-weight:bold;font-size:30px; margin-left:15%;color:#17252A }

#pp{font-weight:bold; ;font-size:80px;color:#008080 ; text-decoration:none}
#sins{margin-left:60% ; }
#lsins{text-decoration:none;font-size:30px;color:#17252A;font-weight:bold}
#str{display: grid; grid-template-columns: repeat(3,1fr) ; grid-auto-rows: 123px;}
#grid{display: grid; grid-template-columns: 3fr 2fr ; grid-auto-rows: 540px;}


#typeuser{display: grid; grid-template-columns: 2fr 6fr 2fr ; grid-auto-rows: 540px;}
#who{background-color:#456f93;}
#whosides{background-color:#e9f5ff;}
#formwho{text-align:center;background-color:#294257;margin-left:30%;margin-right:30%;border:solid 5px #294257 ;border-radius:100px }
#suiv{margin-left:75%;border:solid 3px white ; color:#0073d8; width:200px;height:40px;background-color:white;font-size:30px;font-weight:bold}
#traitement{overflow-x: hidden; overflow-y: auto;}

#foot{display: grid; grid-template-columns: 1fr 1fr 1fr ; grid-auto-rows: 180px;background-color:#17252A;color:white;font-size:24px}
#droite{background-color:#6495ED;color:white}
#no{width:23px;height:25px}

#lsins:hover{color:white;background-color:#17252A}
input{border:solid 2px white;border-radius:10px;font-weight:bold;color:green;background-color:#e9f5ff}
#form1{ border :solid 3px #17252A;
                      box-shadow:#2B7A78 5px  ; 
                      margin: auto ; width:440px ; text-align:center ;border-radius:20px;}
:required{ border-color: white}

#submit{ background-color:#17252A ; color:white;width:150px;border : 1px solid black ;font-size:18px}

#menu{ background-color: teal; opacity: 0.95;font-size:30px;height:5%;margin-right:7%;margin-left:5%;border-radius:10px;margin-top:0.5%;}

a{text-decoration: none;color:white;font-weight: bold;}
a:hover{color:#17252A;background-color:white  ;}
li{display: inline-block; list-style-type: none;width: 313px;}


<?php switch($_SERVER['PHP_SELF']){
                      case "/Projenct/ClientCommande.php": echo" #m1{color:#17252A; background-color:white ;}"; break;
                      case "/Project/ClientCommande.php": echo" #m2{color:#17252A; background-color:white ;}"; break;
                      case "/Project/attestationC.php": echo" #m12{color:#17252A; background-color:white ;}"; break;
                      case "/Project/Validations.php": echo" #m7{color:teal; background-color:white ;}"; break;
                      case "/Project/choixLivreur.php": echo" #m7{color:teal; background-color:white ;}"; break;
                      case "/Project/receptionpharmacie.php": echo" #m5{color:teal; background-color:white ;}"; break;
                      case "/Project/receptionClient.php": echo" #m14{color:#17252A; background-color:white ;}"; break;
                      case "/Project/Livraison.php": echo" #m71{color:#17252A; background-color:white ;}"; break;
                      case "/Project/validationLivreur.php": echo" #m100{color:#17252A; background-color:white ;}"; break;
                      case "/Project/modifLivreur.php": echo" #m20{color:#17252A; background-color:white ;}"; break;
                      case "/Project/modifClient.php": echo" #m152{color:#17252A; background-color:white ;}"; break;
                      case "/Project/ajoutMedicament.php": echo" #mc2{color:#17252A; background-color:white ;}"; break;
                      case "/Project/modifPharmacie.php": echo" #m02{color:#17252A; background-color:white ;}"; break;
                      case "/Project/analyses.php": echo" #m111{color:#17252A; background-color:white ;}"; break;
                      case "/Project/gestion.php": echo" #m999{color:#17252A; background-color:white ;}"; break;
                }
                
?>



</style>