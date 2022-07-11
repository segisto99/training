<?php



include("connectionBDD.php");

//CHIFFRES PHARMACIES 5       
$chifpharm=mysqli_query($connect," select  sum(quantiteChoisi*prixM) chiffres ,nomP from medicamentsChoisis 
                             join medicaments using(idMedicament) join pharmacie using(idPharmacie) natural join commande
                             WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                             group by idPharmacie
                             order by chiffres desc
                             limit 5");

//CHIFFRES MEDICAMENTS 5
$chifmed=mysqli_query($connect," select nomM, sum(quantiteChoisi*prixM) total 
                                 from medicamentschoisis join medicaments using(idMedicament) join commande using(idOrdonnance)
                                 WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                 group by idMedicament
                                 order by total desc 
                                 limit 5 ");

// LES  MEDICAMENTS LES PLUS DEMANDES 5

$demamed=mysqli_query($connect," select sum(quantiteChoisi) demandes,nomM
                                  from medicamentschoisis join medicaments using(idMedicament) join commande using(idOrdonnance)
                                  WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                  group by idMedicament
                                  order by demandes desc 
                                  limit 5  ");

//LES VILLES LES PLUS LIVRES 5
$demaville=mysqli_query($connect," select villeC, count(*) nombreL from livraison natural join client join commande using(idCommande)
                                 WHERE MONTH(dateCommande) = MONTH(CURRENT_DATE()) and YEAR(dateCommande) = YEAR(CURRENT_DATE())
                                 group by villeC
                                 order by nombreL desc 
                                 limit 5  ");

            



?>