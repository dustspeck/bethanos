<html>
<body>
<?php
//write to ledger=======================================================================
$post = $_POST['param'];
$entry = array(substr($post, 0, strpos($post, '|')), substr($post, strpos($post, '|')+1));
$data_file = 'data.txt';
$pre = file_get_contents('data.txt');
$data_file_handle_w = fopen($data_file, 'w');
fwrite($data_file_handle_w, $post.PHP_EOL.$pre);
fclose($data_file_handle_w);
//======================================

//rankings==============================================================================
//init
$curr_rankers = array();
array_push($curr_rankers, $entry);
$rank_file_handler = fopen('rankers.txt', 'r');
while (!feof($rank_file_handler)) {
	$line = trim(fgets($rank_file_handler));
	$ranker =  array(substr($line, 0, strpos($line, '|')), substr($line, strpos($line, '|')+1));
	array_push($curr_rankers, $ranker);
}
fclose($rank_file_handler);
//
//sorting
$len = count($curr_rankers);
for ($i=0; $i<$len-1; $i++) { 
	for ($j=0; $j<$len-$i-1; $j++) { 
		if($curr_rankers[$j][1]>$curr_rankers[$j+1][1]){
			$temp = array($curr_rankers[$j][0], $curr_rankers[$j][1]);
			$curr_rankers[$j][0]=$curr_rankers[$j+1][0];
			$curr_rankers[$j][1]=$curr_rankers[$j+1][1];
			$curr_rankers[$j+1][0]=$temp[0];
			$curr_rankers[$j+1][1]=$temp[1];
		}
	}
}
$curr_rankers = array_reverse($curr_rankers);
//
while (count($curr_rankers)>3) {
	array_pop($curr_rankers);
}

echo "<script>";
for ($i=0; $i < count($curr_rankers); $i++) { 
	for ($j=0; $j < 2; $j++) { 
		echo "console.log('".$curr_rankers[$i][$j]."');";
	}
}
echo "</script>";

//write new rankers
$new_rank_file_handler = fopen('rankers.txt', 'w');
for ($i=0; $i < count($curr_rankers) ; $i++) { 
	//fputs($new_rank_file_handler, ($i+1)."|");
	for ($j=0; $j < 2; $j++) { 
		fputs($new_rank_file_handler, $j==0 ? $curr_rankers[$i][$j]."|" : $curr_rankers[$i][$j].PHP_EOL);
	}
}
fclose($new_rank_file_handler);
//
//======================================
?>
</body>
</html>