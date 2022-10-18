<?php
$imgData = str_replace(' ','+',$_POST['img']);
$imgData =  substr($imgData,strpos($imgData,",")+1);
$imgData = base64_decode($imgData);
$id=uniqid();
$filePath = 'output/'.$id.'temp2.png';

$file = fopen($filePath, 'w');
fwrite($file, $imgData);

fclose($file);


?>