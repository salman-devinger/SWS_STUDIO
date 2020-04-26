<?php
include '../config.php';

$ser_con=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
or die('cannot connect to the server');
$sql= 'CALL ATT_UI_GET_EXERCISE_LIST()';
$res=mysqli_query($ser_con,$sql);
while($data[] = $res->fetch_assoc()){
    $json = json_encode($data);
}
mysqli_close($ser_con);
echo $json;
?>