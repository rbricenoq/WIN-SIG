<?php  
$db = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root"); 
echo $_POST[capacidad] . ' Llega';
$temp = $_POST['fh'];
echo $temp;
?>