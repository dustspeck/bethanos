<?php
//write to ledger=======================================================================
$post = $_POST['param'];
//$entry = array(substr($post, 0, strpos($post, '|')), substr($post, strpos($post, '|')+1));
$data_file = 'data.txt';
$pre = file_get_contents('data.txt');
$data_file_handle_w = fopen($data_file, 'w');
fwrite($data_file_handle_w, $post.PHP_EOL.$pre);
fclose($data_file_handle_w);
//======================================

?>