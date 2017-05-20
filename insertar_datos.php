<?php  
$db = pg_connect("host=localhost port=5432 dbname=winsig user=postgres password=root"); 
echo $_POST[capacidad] . ' Llega';
$var = $_GET['fh'];
echo $var;

$field1value = isset($_POST['FH']) ;

echo $var . ' Llega';
?>