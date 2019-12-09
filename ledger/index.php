<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V01</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">

				<div class="table100">

					<table>
						<thead>
							<tr class="table100-heading">
								<th class="column6" colspan="3">RANKERS</th>
							</tr>
						</thead>
						<thead>
							<tr class="table100-head">
								<!--<th class="column5">Rank</th>-->
								<th class="column6">Name</th>
								<th class="column4">Score</th>
								<th class="column6">Reg No</th>
							</tr>
						</thead>
						<tbody>
<?php
							$file1 = fopen("rankers.txt", "r") or die("Unable to open file!");
							$i=1;
							while (!feof($file1)){   
   	 							$data = fgets($file1); 
   	 							$col = ($i<=3)?"column".$i:"column4";
   	 							echo '<tr><td class="column'; if($i<=3) echo $i; else echo "4";
   	 							echo '">' . str_replace('|','</td><td class="'.$col.'">',$data) . '</td></tr>';
   	 							$i++;
							}
?>
						</tbody>
					</table>
					<br><br><br>

					<table>
						<thead>
							<tr class="table100-heading">
								<th class="column6" colspan="2">HISTORY</th>
							</tr>
						</thead>
						<thead>
							<tr class="table100-head">
								<th class="column6">Name / Reg No.</th>
								<th class="column4">Score</th>
							</tr>
						</thead>
						<tbody>
<?php
							$file2 = fopen("data.txt", "r") or die("Unable to open file!");
							while (!feof($file2)){   
   	 							$data = fgets($file2);
   	 							$data=strrev($data);
   	 							$data=substr($data, strpos($data, "|")+1);
   	 							$data=strrev($data);
   	 							echo '<tr><td class="column4">' . str_replace('|','</td><td class="column6">',$data) . '</td></tr>';
							}
?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



</body>
</html>