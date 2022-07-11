
  <?php include("noteStats.php")  ?>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Notes", "Pourcentage", { role: "style" }, ],
        ["Supérieur a 15", <?php echo("$supa15"); ?> , " #A0522D"],
        ["Entre 10 et 15", <?php echo("$supa10inf15"); ?>, "#6495ED"],
        ["Entre 5 et 10",  <?php echo("$supa5inf10"); ?>, "gray"],
        ["Inférieur a 5",  <?php echo("$infa5"); ?>, "#17252A"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       var options = {
        title: "Notes des utilisateurs, en % ",
        width: 617,
        height: 291,
        
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("dr"));
      chart.draw(view, options);
  }

 
    
  </script>