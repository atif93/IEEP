<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link type="text/css" rel="stylesheet" href="../css/common.css"  /><link type="text/css" rel="stylesheet" href="../css/buttons.css"  />
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['ID', 'CO2 Emissions (%)', 'CO2 Emissions (Metric tonnes per Capita)', 'Region'],
          ['US',    28,              17.28,      'The United States of America'],
          ['EU',    23,              7.2,      'Europe'],
          ['RU',    11,               11.09,      'Russia'],
          ['CH',    9,              5.77,      'China'],
          ['JA',    4,              8.63,         'Japan'],
          ['IN',    3,              1.64,       'India'],
          ['OECD',    5,              7.50,      'France, Germany, etc.'],
          ['Rest of World',    18,              4.7,      'World']
        ]);

        var options = {
          title: 'Share of Global Cumulative Energy-related CO2 emissions for major emitters',
          hAxis: {title: 'CO2 Emissions (%)'},
          vAxis: {title: 'CO2 Emissions (Metric tonnes per Capita)'},
          bubble: {textStyle: {fontSize: 11}},
		     animation:{
        duration: 2000,
        easing: 'in'
      },
        };

        var chart = new google.visualization.BubbleChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  The major emitters of CO2 are shown in the following Bubble Diagram :
  <br>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>
     <?php
include_once("include/load_question.php");
  $quest = new question();
  $quest->load_question(5,103);
?>
  </body>
</html>