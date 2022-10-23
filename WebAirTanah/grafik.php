<h1>Grafik Suhu Tanah Dan Kelembapan Tanah</h1>
<?php
					
 $sql="select * from `$tbmonitoring` order by `id_monitoring` desc  limit 0,30 ";
	$arr=getData($conn,$sql);
	$no=0;
	$gab="";
	$sensor_m=0;
	$sensor_t=0;
	$lab="<table width='90%' border='1'>
	<tr><th>No<th>Tanggal<th>Jam<th>$asensor_m<th>$asensor_t</tr>";
		foreach($arr as $d) {						
				$no++; 
					$tanggal=($d["tanggal"]);
					$jam=$d["jam"];
					$sensor_m1=$d["sensor_m1"];
					$sensor_m2=$d["sensor_m2"];
					$sensor_m=($sensor_m1+$sensor_m2)/2;
					$sensor_t1=$d["sensor_t1"];
					$sensor_t2=$d["sensor_t2"];
					$sensor_t=($sensor_t1+$sensor_t2)/2;
					
					$gab.="['$jam',  $sensor_m,$sensor_t],";
					$lab.="<tr>
					<td>$no
					<td>$tanggal
					<td>$jam
					<td>$sensor_m
					<td>$sensor_t
					";
		}
		$lab.="</table>";
		$gab=substr($gab,0,strlen($gab)-1);

?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Waktu', '<?php echo $asensor_m;?>', '<?php echo $asensor_t;?>'],<?php echo $gab;?>
        ]);

        var options = {
          title: 'Grafik <?php echo $asensor_m;?> and   <?php echo $asensor_t;?> ',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 1200px; height: 800px"></div>
  </body>
  <?php
  echo $lab;
  
  ?>

