<?php include("Reporting.php"); 
$nomP = array();
$chP = array();
$i=0;
while($res=mysqli_fetch_array($chifpharm))
{
    $nomP[$i] =$res['nomP'];
    $chP[$i] =$res['chiffres'];
    $i++;

}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Pharmacie", "Chiffres", { role: "style" }, ],
        ["<?=$nomP[0]?>", <?=$chP[0]?> , "teal"],
        <?php if(isset($chP[1])){ ?> ["<?=$nomP[1]?>", <?=$chP[1]?> , "#003366"], <?php }?>
        <?php if(isset($chP[2])){ ?> ["<?=$nomP[2]?>", <?=$chP[2]?> , "#6495ED"], <?php }?> 
        <?php if(isset($chP[3])){ ?> ["<?=$nomP[3]?>", <?=$chP[3]?> , "#001a33"], <?php } ?>
        <?php if(isset($chP[4])){ ?> ["<?=$nomP[4]?>", <?=$chP[4]?> , "cyan"], <?php } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "Les chiffre d'affaires les plus élevèes , en FCFA ",
        width: 477,
        height: 281,
        
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chP"));
      chart.draw(view, options);
  }

 
    
  </script>

<?php include("Reporting.php"); 
$nomM = array();
$chM = array();
$i=0;
while($res=mysqli_fetch_array($chifmed))
{
    $nomM[$i] =$res['nomM'];
    $chM[$i] =$res['total'];
    $i++;

}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Médicaments", "Chiffres", { role: "style" }, ],
        ["<?=$nomM[0]?>" , <?=$chM[0]?> , "teal"],
        <?php if(isset($chM[1])){ ?> ["<?=$nomM[1]?>", <?=$chM[1]?> , "#003366"], <?php }?>
        <?php if(isset($chM[2])){ ?> ["<?=$nomM[2]?>", <?=$chM[2]?> , "#6495ED"], <?php }?> 
        <?php if(isset($chM[3])){ ?> ["<?=$nomM[3]?>", <?=$chM[3]?> , "#001a33"], <?php } ?>
        <?php if(isset($chM[4])){ ?> ["<?=$nomM[4]?>", <?=$chM[4]?> , "cyan"], <?php } ?>
       
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "Chiffres des médicaments , en FCFA",
        width: 477,
        height: 281,
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chM"));
      chart.draw(view, options);
  }

 
    
  </script>


<?php include("Reporting.php"); 
$villeL = array();
$ch = array();
$i=0;
while($res=mysqli_fetch_array($demaville))
{
    $villeL[$i] =$res['villeC'];
    $ch[$i] =$res['nombreL'];
    $i++;

}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Villes", "Nombre de livraisons", { role: "style" }, ],
        ["<?=$villeL[0]?>" , <?=$ch[0]?> , "teal"],
        <?php if(isset($ch[1])){ ?> ["<?=$villeL[1]?>", <?=$ch[1]?> , "#003366"], <?php }?>
        <?php if(isset($ch[2])){ ?> ["<?=$villeL[2]?>", <?=$ch[2]?> , "#6495ED"], <?php }?> 
        <?php if(isset($ch[3])){ ?> ["<?=$villeL[3]?>", <?=$ch[3]?> , "#001a33"], <?php } ?>
        <?php if(isset($ch[4])){ ?> ["<?=$villeL[4]?>", <?=$ch[4]?> , "cyan"], <?php } ?>
       
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "Les villes les plus livrèes ",
        width: 477,
        height: 281,
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chVL"));
      chart.draw(view, options);
  }

 
    
  </script>


<?php include("Reporting.php"); 
$nomM = array();
$chM = array();
$i=0;
while($res=mysqli_fetch_array($demamed))
{
    $nomM[$i] =$res['nomM'];
    $chM[$i] =$res['demandes'];
    $i++;

}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Médicaments", "Demandes", { role: "style" }, ],
        ["<?=$nomM[0]?>" , <?=$chM[0]?> , "teal"],
        <?php if(isset($chM[1])){ ?> ["<?=$nomM[1]?>", <?=$chM[1]?> , "#003366"], <?php }?>
        <?php if(isset($chM[2])){ ?> ["<?=$nomM[2]?>", <?=$chM[2]?> , "#6495ED"], <?php }?> 
        <?php if(isset($chM[3])){ ?> ["<?=$nomM[3]?>", <?=$chM[3]?> , "#001a33"], <?php } ?>
        <?php if(isset($chM[4])){ ?> ["<?=$nomM[4]?>", <?=$chM[4]?> , "cyan"], <?php } ?>
       
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "Les médicaments les plus demandées ",
        width: 477,
        height: 281,
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("chMD"));
      chart.draw(view, options);
  }

 
    
  </script>