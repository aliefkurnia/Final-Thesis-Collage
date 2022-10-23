<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#examplec').DataTable();
} );
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


<table id="examplec" class="display" style="width:100%">
        <thead>
            <tr> <th width="5%">No</th>
                 <th width="25%">Waktu</td>
	<th width="5%"><?php echo $asensor_m1;?></td>
	<th width="5%"><?php echo $asensor_t1;?></td>
    <th width="5%"><?php echo $asensor_m2;?></td>
	<th width="5%"><?php echo $asensor_t2;?></td>
    <th width="5%">Motor</td>
				<th width="10%">Keterangan</td>
            </tr>
        </thead>
        <tbody>
           
<?php  
  $sql="select * from `$tbmonitoring`  order by `id_monitoring` desc";
	$arr=getData($conn,$sql);
	$no=0;
		foreach($arr as $d) {						
				$no++;
				$id_monitoring=$d["id_monitoring"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$sensor_m1=$d["sensor_m1"];
				$sensor_t1=$d["sensor_t1"];
				$sensor_m2=$d["sensor_m2"];
				$sensor_t2=$d["sensor_t2"];
				$motor=$d["motor"];
				$keterangan=$d["keterangan"];
				
			
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tanggal $jam</td>
				<td>$sensor_m1</td>
				<td>$sensor_t1</td>
				<td>$sensor_m2</td>
				<td>$sensor_t2</td>
				<td>$motor</td>
				<td>$keterangan</td>
				</tr>
				";
		}
		?>
        </tbody>
        <tfoot>
            <tr>
			 <tr> <th width="5%">No</th>
                 <th width="25%">Waktu</td>
	<th width="5%"><?php echo $asensor_m1;?></td>
	<th width="5%"><?php echo $asensor_t1;?></td>
    <th width="5%"><?php echo $asensor_m2;?></td>
	<th width="5%"><?php echo $asensor_t2;?></td>
    <th width="5%">Motor</td>
				<th width="10%">Keterangan</td>
            </tr>
        </tfoot>
    </table>